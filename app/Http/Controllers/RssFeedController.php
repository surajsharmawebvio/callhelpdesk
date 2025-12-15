<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class RssFeedController extends Controller
{
    /**
     * Generate RSS feed for all companies.
     */
    public function companies(Request $request)
    {
        // Cache the RSS feed for 1 hour
        $rss = Cache::remember('rss_feed_main', 3600, function () {
            $companies = Company::published()
                ->with(['category', 'author'])
                ->orderBy('updated_at', 'desc')
                ->limit(50) // Limit to 50 most recent companies
                ->get();

            return $this->generateRssFeed($companies, [
                'title' => config('app.name') . ' - Business Directory',
                'description' => 'Latest business listings and company contact information from ' . config('app.name'),
                'link' => route('companies.index'),
            ]);
        });

        return response($rss)
            ->header('Content-Type', 'text/xml; charset=utf-8')
            ->header('Cache-Control', 'public, max-age=900')
            ->header('X-Content-Type-Options', 'nosniff');
    }

    /**
     * Generate RSS feed for a specific company category.
     */
    public function companyCategory(Request $request, $categoryId)
    {
        $cacheKey = "rss_feed_category_{$categoryId}";
        
        $rss = Cache::remember($cacheKey, 3600, function () use ($categoryId) {
            $companies = Company::published()
                ->with(['category', 'author'])
                ->where('company_category_id', $categoryId)
                ->orderBy('updated_at', 'desc')
                ->limit(50)
                ->get();

            $categoryName = $companies->first()?->category?->name ?? 'Category';

            return $this->generateRssFeed($companies, [
                'title' => config('app.name') . " - {$categoryName} Companies",
                'description' => "Latest companies in {$categoryName} category",
                'link' => route('companies.index', ['category' => $categoryId]),
            ]);
        });

        return response($rss, 200)
            ->header('Content-Type', 'application/rss+xml; charset=utf-8');
    }

    /**
     * Generate RSS feed for a single company (company updates).
     */
    public function company(Request $request, $phoneNumber, $companyName)
    {
        $url = strtolower("{$phoneNumber}/{$companyName}");
        
        $company = Company::published()
            ->with(['category', 'author', 'questions'])
            ->where('url', $url)
            ->firstOrFail();

        $cacheKey = "rss_feed_company_{$company->id}";
        
        $rss = Cache::remember($cacheKey, 3600, function () use ($company) {
            return $this->generateCompanyRssFeed($company);
        });

        return response($rss, 200)
            ->header('Content-Type', 'text/xml; charset=utf-8');
    }

    /**
     * Generate RSS XML for companies list.
     */
    private function generateRssFeed($companies, $feedInfo)
    {
        $xml = [];
        $xml[] = '<?xml version="1.0" encoding="UTF-8"?>';
        $xml[] = '<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom" xmlns:media="http://search.yahoo.com/mrss/" xmlns:dc="http://purl.org/dc/elements/1.1/">';
        $xml[] = '  <channel>';
        $xml[] = '    <title>' . $this->escapeXml($feedInfo['title']) . '</title>';
        $xml[] = '    <description>' . $this->escapeXml($feedInfo['description']) . '</description>';
        $xml[] = '    <link>' . $this->escapeXml($feedInfo['link']) . '</link>';
        $xml[] = '    <atom:link href="' . $this->escapeXml(url()->current()) . '" rel="self" type="application/rss+xml" />';
        $xml[] = '    <language>en-gb</language>';
        $xml[] = '    <lastBuildDate>' . now()->toRssString() . '</lastBuildDate>';
        $xml[] = '    <generator>' . $this->escapeXml(config('app.name') . ' RSS Generator') . '</generator>';
        $xml[] = '    <copyright>' . $this->escapeXml('Copyright ' . date('Y') . ' ' . config('app.name')) . '</copyright>';
        $xml[] = '    <ttl>15</ttl>';

        foreach ($companies as $company) {
            $urlParts = explode('/', trim($company->url, '/'));
            $companyUrl = route('company.show', [
                'phoneNumber' => $urlParts[0] ?? '',
                'companyName' => $urlParts[1] ?? ''
            ]);

            $xml[] = '    <item>';
            $xml[] = '      <title>' . $this->escapeXml($company->name) . '</title>';
            $xml[] = '      <description>' . $this->escapeXml($this->generateCompanyDescription($company)) . '</description>';
            $xml[] = '      <link>' . $this->escapeXml($companyUrl) . '</link>';
            $xml[] = '      <guid isPermaLink="true">' . $this->escapeXml($companyUrl) . '</guid>';
            $xml[] = '      <pubDate>' . ($company->created_at ?? now())->toRssString() . '</pubDate>';

            if ($company->category) {
                $xml[] = '      <category>' . $this->escapeXml($company->category->name) . '</category>';
                $xml[] = '      <dc:subject>' . $this->escapeXml($company->category->name) . '</dc:subject>';
            }

            if ($company->author) {
                $xml[] = '      <dc:creator>' . $this->escapeXml($company->author->name ?? 'CallHelpDesk') . '</dc:creator>';
            }

            // Add image if available
            if ($company->right_ad_image) {
                $imageUrl = str_starts_with($company->right_ad_image, 'http')
                    ? $company->right_ad_image
                    : url($company->right_ad_image);
                $xml[] = '      <media:thumbnail url="' . $this->escapeXml($imageUrl) . '" />';
                $xml[] = '      <media:content url="' . $this->escapeXml($imageUrl) . '" type="image/jpeg" />';
            }

            $xml[] = '    </item>';
        }

        $xml[] = '  </channel>';
        $xml[] = '</rss>';

        return implode(PHP_EOL, $xml);
    }

    /**
     * Generate a clean description for a company.
     */
    private function generateCompanyDescription($company)
    {
        $description = '';

        if ($company->phone) {
            $description .= 'Phone: ' . $company->phone;
        }

        if ($company->website) {
            $description .= ($description ? ' | ' : '') . 'Website: ' . $company->website;
        }

        if ($company->category) {
            $description .= ($description ? ' | ' : '') . 'Category: ' . $company->category->name;
        }

        if ($company->content) {
            // Remove emojis and clean content
            $cleanContent = preg_replace('/[\x{1F600}-\x{1F64F}]/u', '', $company->content); // Remove emoticons
            $cleanContent = preg_replace('/[\x{1F300}-\x{1F5FF}]/u', '', $cleanContent); // Remove symbols & pictographs
            $cleanContent = preg_replace('/[\x{1F680}-\x{1F6FF}]/u', '', $cleanContent); // Remove transport & map symbols
            $cleanContent = preg_replace('/[\x{1F1E0}-\x{1F1FF}]/u', '', $cleanContent); // Remove flags
            $cleanContent = preg_replace('/[\x{2600}-\x{26FF}]/u', '', $cleanContent); // Remove misc symbols
            $cleanContent = strip_tags($cleanContent);
            $cleanContent = html_entity_decode($cleanContent, ENT_QUOTES | ENT_HTML5, 'UTF-8');
            $cleanContent = trim($cleanContent);
            
            $description .= ($description ? "\n\n" : '') . mb_substr($cleanContent, 0, 300) . (mb_strlen($cleanContent) > 300 ? '...' : '');
        }

        return $description;
    }

    /**
     * Generate RSS XML for a single company with its Q&A.
     */
    private function generateCompanyRssFeed($company)
    {
        $urlParts = explode('/', trim($company->url, '/'));
        $companyUrl = route('company.show', [
            'phoneNumber' => $urlParts[0] ?? '',
            'companyName' => $urlParts[1] ?? ''
        ]);

        $xml = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        $xml .= '<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom" xmlns:content="http://purl.org/rss/1.0/modules/content/">' . "\n";
        $xml .= '  <channel>' . "\n";
        $xml .= '    <title>' . $this->escapeXml($company->name . ' - ' . config('app.name')) . '</title>' . "\n";
        $xml .= '    <description>' . $this->escapeXml('Updates and information about ' . $company->name) . '</description>' . "\n";
        $xml .= '    <link>' . $this->escapeXml($companyUrl) . '</link>' . "\n";
        $xml .= '    <atom:link href="' . $this->escapeXml(url()->current()) . '" rel="self" type="application/rss+xml" />' . "\n";
        $xml .= '    <language>en-us</language>' . "\n";
        $xml .= '    <lastBuildDate>' . ($company->updated_at ?? now())->toRssString() . '</lastBuildDate>' . "\n";

        // Main company item
        $xml .= '    <item>' . "\n";
        $xml .= '      <title>' . $this->escapeXml($company->name . ' - Company Information') . '</title>' . "\n";
        $xml .= '      <link>' . $this->escapeXml($companyUrl) . '</link>' . "\n";
        $xml .= '      <guid isPermaLink="true">' . $this->escapeXml($companyUrl) . '</guid>' . "\n";
        $xml .= '      <pubDate>' . ($company->created_at ?? now())->toRssString() . '</pubDate>' . "\n";
        
        if ($company->category) {
            $xml .= '      <category>' . $this->escapeXml($company->category->name) . '</category>' . "\n";
        }

        $description = '';
        if ($company->phone) {
            $description .= 'Phone: ' . $company->phone . "\n\n";
        }
        if ($company->content) {
            $description .= strip_tags($company->content);
        }
        
        $xml .= '      <description>' . $this->escapeXml(mb_substr($description, 0, 500)) . '</description>' . "\n";
        
        if ($company->content) {
            $xml .= '      <content:encoded><![CDATA[' . $company->content . ']]></content:encoded>' . "\n";
        }

        $xml .= '    </item>' . "\n";

        // Add Q&A items
        if ($company->questions && $company->questions->count() > 0) {
            foreach ($company->questions as $question) {
                $xml .= '    <item>' . "\n";
                $xml .= '      <title>' . $this->escapeXml('Q&A: ' . $question->question) . '</title>' . "\n";
                $xml .= '      <link>' . $this->escapeXml($companyUrl . '#question-' . $question->id) . '</link>' . "\n";
                $xml .= '      <guid isPermaLink="true">' . $this->escapeXml($companyUrl . '#question-' . $question->id) . '</guid>' . "\n";
                $xml .= '      <pubDate>' . ($question->created_at ?? $company->created_at ?? now())->toRssString() . '</pubDate>' . "\n";
                $xml .= '      <category>Q&amp;A</category>' . "\n";
                $xml .= '      <description>' . $this->escapeXml($question->answer ?? 'No answer provided yet.') . '</description>' . "\n";
                $xml .= '      <content:encoded><![CDATA[' . "\n";
                $xml .= '        <h3>Question:</h3>' . "\n";
                $xml .= '        <p>' . htmlspecialchars($question->question) . '</p>' . "\n";
                $xml .= '        <h3>Answer:</h3>' . "\n";
                $xml .= '        <p>' . ($question->answer ?? 'No answer provided yet.') . '</p>' . "\n";
                $xml .= '      ]]></content:encoded>' . "\n";
                $xml .= '    </item>' . "\n";
            }
        }

        $xml .= '  </channel>' . "\n";
        $xml .= '</rss>';

        return $xml;
    }

    /**
     * Escape XML special characters.
     */
    private function escapeXml($string)
    {
        return htmlspecialchars($string ?? '', ENT_XML1 | ENT_QUOTES, 'UTF-8');
    }

    /**
     * Clear RSS feed cache.
     */
    public function clearCache()
    {
        Cache::flush();
        return response()->json(['message' => 'RSS feed cache cleared successfully']);
    }
}
