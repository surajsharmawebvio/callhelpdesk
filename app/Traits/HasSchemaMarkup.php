<?php

namespace App\Traits;

trait HasSchemaMarkup
{
    /**
     * Generate default schema markup for the page.
     */
    public function generateDefaultSchemaMarkup(): array
    {
        $url = url()->current();
        $siteName = config('app.name');
        
        return [
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
    }

    /**
     * Generate breadcrumb schema.
     */
    protected function generateBreadcrumbSchema(): array
    {
        $breadcrumbs = $this->getBreadcrumbs();
        
        $items = collect($breadcrumbs)->map(function ($breadcrumb, $index) {
            return [
                '@type' => 'ListItem',
                'position' => $index + 1,
                'name' => $breadcrumb['name'],
                'item' => $breadcrumb['url'],
            ];
        })->values()->toArray();

        return [
            '@type' => 'BreadcrumbList',
            'itemListElement' => $items,
        ];
    }

    /**
     * Get breadcrumbs for the page.
     */
    protected function getBreadcrumbs(): array
    {
        // Default breadcrumbs - can be overridden in models
        return [
            ['name' => 'Home', 'url' => url('/')],
            ['name' => $this->getSeoTitleFallback(), 'url' => url()->current()],
        ];
    }

    /**
     * Get schema markup with fallback to auto-generated.
     */
    public function getSchemaMarkup(): array
    {
        // If custom edited JSON schema exists, use it
        if ($this->seo?->schema_markup_json && is_array($this->seo->schema_markup_json)) {
            return $this->seo->schema_markup_json;
        }

        // If custom schema exists in SEO, merge with auto-generated
        if ($this->seo?->schema_markup && is_array($this->seo->schema_markup)) {
            return array_merge(
                $this->generateDefaultSchemaMarkup(),
                $this->seo->schema_markup
            );
        }

        // Otherwise use auto-generated schema
        return $this->generateDefaultSchemaMarkup();
    }
}
