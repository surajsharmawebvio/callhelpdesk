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
        $rss = Cache::remember('rss_feed_companies', 3600, function () {
            $companies = Company::published()
                ->with(['category', 'author'])
                ->orderBy('updated_at', 'desc')
                ->limit(50) // Limit to 50 most recent companies
                ->get();

            return $this->generateRssFeed($companies, [
                'title' => config('app.name') . ' - Companies Directory',
                'description' => 'Latest companies and their contact information',
                'link' => route('companies.index'),
            ]);
        });

        return response($rss, 200)
            ->header('Content-Type', 'application/rss+xml; charset=utf-8');
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
            ->header('Content-Type', 'application/rss+xml; charset=utf-8');
    }

    /**
     * Generate RSS XML for companies list.
     */
    private function generateRssFeed($companies, $feedInfo)
    {
        $xml = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        $xml .= '<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom" xmlns:content="http://purl.org/rss/1.0/modules/content/">' . "\n";
        $xml .= '  <channel>' . "\n";
        $xml .= '    <title>' . $this->escapeXml($feedInfo['title']) . '</title>' . "\n";
        $xml .= '    <description>' . $this->escapeXml($feedInfo['description']) . '</description>' . "\n";
        $xml .= '    <link>' . $this->escapeXml($feedInfo['link']) . '</link>' . "\n";
        $xml .= '    <atom:link href="' . $this->escapeXml(url()->current()) . '" rel="self" type="application/rss+xml" />' . "\n";
        $xml .= '    <language>en-us</language>' . "\n";
        $xml .= '    <lastBuildDate>' . now()->toRssString() . '</lastBuildDate>' . "\n";
        $xml .= '    <generator>' . config('app.name') . '</generator>' . "\n";

        foreach ($companies as $company) {
            $urlParts = explode('/', trim($company->url, '/'));
            $companyUrl = route('company.show', [
                'phoneNumber' => $urlParts[0] ?? '',
                'companyName' => $urlParts[1] ?? ''
            ]);

            $xml .= '    <item>' . "\n";
            $xml .= '      <title>' . $this->escapeXml($company->name) . '</title>' . "\n";
            $xml .= '      <link>' . $this->escapeXml($companyUrl) . '</link>' . "\n";
            $xml .= '      <guid isPermaLink="true">' . $this->escapeXml($companyUrl) . '</guid>' . "\n";
            $xml .= '      <pubDate>' . ($company->created_at ?? now())->toRssString() . '</pubDate>' . "\n";
            
            if ($company->updated_at) {
                $xml .= '      <atom:updated>' . $company->updated_at->toAtomString() . '</atom:updated>' . "\n";
            }

            if ($company->category) {
                $xml .= '      <category>' . $this->escapeXml($company->category->name) . '</category>' . "\n";
            }

            if ($company->author) {
                $xml .= '      <author>' . $this->escapeXml($company->author->email ?? $company->author->name) . '</author>' . "\n";
            }

            // Description with company details
            $description = '';
            if ($company->phone) {
                $description .= 'Phone: ' . $company->phone . "\n";
            }
            if ($company->content) {
                $description .= "\n" . strip_tags($company->content);
            }
            
            $xml .= '      <description>' . $this->escapeXml(mb_substr($description, 0, 500)) . '</description>' . "\n";
            
            // Full content
            if ($company->content) {
                $xml .= '      <content:encoded><![CDATA[' . $company->content . ']]></content:encoded>' . "\n";
            }

            // Add image if available
            if ($company->right_ad_image) {
                $imageUrl = str_starts_with($company->right_ad_image, 'http') 
                    ? $company->right_ad_image 
                    : url($company->right_ad_image);
                $xml .= '      <enclosure url="' . $this->escapeXml($imageUrl) . '" type="image/jpeg" />' . "\n";
            }

            $xml .= '    </item>' . "\n";
        }

        $xml .= '  </channel>' . "\n";
        $xml .= '</rss>';

        return $xml;
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
