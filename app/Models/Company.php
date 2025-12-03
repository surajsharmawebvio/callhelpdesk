<?php

namespace App\Models;

use App\Traits\HasSeo;
use App\Traits\HasSchemaMarkup;
use Illuminate\Database\Eloquent\Model;
use Webvio\DynamicSitemap\Observers\ModelObserver;

class Company extends Model
{
    use HasSeo, HasSchemaMarkup;

    protected $table = 'company';
    protected $primaryKey = 'id';
    public $incrementing = true;

    protected $fillable = [
        'author_id',
        'content',
        'name',
        'phone',
        'ulpad',
        'url',
        'ad_id',
        'popup_id',
        'published',
        'right_ad_image',
        'bottom_right_ad_image',
        'company_category_id',
        'sub_category_id',
    ];

    protected $casts = [
        'published' => 'boolean',
        'ad_id' => 'integer',
        'popup_id' => 'integer',
        'company_category_id' => 'integer',
    ];

    /**
     * Set the URL attribute to lowercase.
     */
    public function setUrlAttribute($value)
    {
        $this->attributes['url'] = $value ? strtolower($value) : $value;
    }

    public function questions()
    {
        return $this->hasMany(CompanyQuestion::class, 'company_id', 'id');
    }

    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    public function category()
    {
        return $this->belongsTo(CompanyCategory::class, 'company_category_id', 'id');
    }

    public function subCategory()
    {
        return $this->belongsTo(CompanyCategory::class, 'sub_category_id', 'id');
    }

    /**
     * Get SEO title fallback.
     */
    public function getSeoTitleFallback(): ?string
    {
        return $this->name;
    }

    /**
     * Get SEO description fallback.
     */
    public function getSeoDescriptionFallback(): ?string
    {
        return strip_tags($this->content) ? mb_substr(strip_tags($this->content), 0, 160) : null;
    }

    /**
     * Get SEO image fallback.
     */
    public function getSeoImageFallback(): ?string
    {
        return $this->right_ad_image;
    }

    /**
     * Scope for published companies.
     */
    public function scopePublished($query)
    {
        return $query->where('published', true);
    }

    /**
     * Get breadcrumbs for the company page.
     */
    protected function getBreadcrumbs(): array
    {
        $breadcrumbs = [
            ['name' => 'Home', 'url' => url('/')],
            ['name' => 'Companies', 'url' => route('companies.index')],
        ];

        // Add category breadcrumb if exists
        if ($this->category) {
            $breadcrumbs[] = [
                'name' => $this->category->name,
                'url' => route('companies.index', ['category' => $this->category->id])
            ];
        }

        // Add company name
        $breadcrumbs[] = [
            'name' => $this->name,
            'url' => route('company.show', [
                'phoneNumber' => explode('/', trim($this->url, '/'))[0] ?? '',
                'companyName' => explode('/', trim($this->url, '/'))[1] ?? ''
            ])
        ];

        return $breadcrumbs;
    }

    /**
     * Generate default schema markup for the company page including FAQ schema.
     */
    public function generateDefaultSchemaMarkup(): array
    {
        $url = url()->current();
        $siteName = config('app.name');

        $schema = [
            '@context' => 'https://schema.org',
            '@graph' => [
                // WebSite schema
                [
                    '@type' => 'WebSite',
                    'name' => $siteName,
                    'url' => url('/'),
                    'potentialAction' => [
                        '@type' => 'SearchAction',
                        'target' => [
                            '@type' => 'EntryPoint',
                            'urlTemplate' => url('/companies?search={search_term_string}'),
                        ],
                        'query-input' => 'required name=search_term_string',
                    ],
                ],
                // WebPage schema
                [
                    '@type' => 'WebPage',
                    'name' => $this->seo?->meta_title ?? $this->getSeoTitleFallback(),
                    'description' => $this->seo?->meta_description ?? $this->getSeoDescriptionFallback(),
                    'url' => $url,
                    'isPartOf' => [
                        '@id' => url('/') . '#website',
                    ],
                ],
                // Breadcrumb schema
                $this->generateBreadcrumbSchema(),
            ],
        ];

        // Ensure questions are loaded
        if (!$this->relationLoaded('questions')) {
            $this->load('questions');
        }

        // Add FAQ schema if company has questions
        if ($this->questions && $this->questions->count() > 0) {
            $faqItems = $this->questions->map(function ($question) {
                return [
                    '@type' => 'Question',
                    'name' => $question->question,
                    'acceptedAnswer' => [
                        '@type' => 'Answer',
                        'text' => $question->answer,
                    ],
                ];
            })->toArray();

            $schema['@graph'][] = [
                '@type' => 'FAQPage',
                'mainEntity' => $faqItems,
            ];
        }

        return $schema;
    }

    /**
     * Boot the model.
     */
    protected static function booted(): void
    {
        static::observe(ModelObserver::class);
    }
}
