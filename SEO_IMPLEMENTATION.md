# SEO Metadata System - Implementation Guide

## Overview
Complete dynamic SEO meta tag management system for Laravel + Filament with polymorphic relationships.

## Components Created

### 1. Database
- **Migration**: `2025_11_21_000001_create_seo_metadata_table.php`
  - Polymorphic columns (seoable_type, seoable_id)
  - Meta tags (title, description, keywords)
  - Open Graph tags (og_title, og_description, og_image, og_type)
  - Twitter Card tags (twitter_card, twitter_title, twitter_description, twitter_image, twitter_site, twitter_creator)
  - Technical SEO (canonical_url, index, follow, locale, priority)
  - Schema markup (JSON)

- **Migration**: `2025_11_21_073647_create_static_pages_table.php`
  - For managing static pages (About Us, Contact Us, Privacy Policy, etc.)

### 2. Models
- **`app/Models/Seo/SeoMetadata.php`**: Main SEO model with polymorphic relationship
  - MorphTo relationship for polymorphic association
  - Fallback methods for all meta fields
  - Cache clearing on save/delete
  - `getRobotsAttribute()` - returns formatted robots meta tag

- **`app/Models/StaticPage.php`**: Model for static pages
  - Uses HasSeo trait
  - Manages content for static routes

- **`app/Models/Company.php`**: Updated with HasSeo trait
  - Custom SEO fallback methods

### 3. Traits
- **`app/Traits/HasSeo.php`**: Polymorphic SEO trait
  - `seo()` - Polymorphic relationship
  - `getOrCreateSeo()` - Get or create SEO metadata
  - `getCachedSeo()` - Cached SEO retrieval
  - `updateSeo()` - Update SEO data
  - `clearSeoCache()` - Clear cache
  - Automatic SEO deletion when parent model is deleted

### 4. Filament Components
- **`app/Filament/Forms/Components/SeoForm.php`**: Reusable SEO form
  - `SeoForm::make()` - Full SEO form with tabs
  - `SeoForm::minimal()` - Simplified SEO form
  - Tabs: Basic Meta, Open Graph, Twitter Card, Technical SEO, Schema Markup

### 5. Filament Resources
- **ManageCompanyResource**: Updated with SEO form
- **StaticPageResource**: New resource for managing static pages
  - Create/Edit pages with integrated SEO forms
  - Data mutation methods for SEO handling

### 6. Helpers
- **`app/Helpers/SeoHelper.php`**: SEO utility functions
  - `getSeoForModel()` - Get SEO for model instance
  - `getSeoForCurrentRoute()` - Get SEO for current route
  - `getSeoForPage()` - Get SEO for static page
  - `clearAllCaches()` - Clear all SEO caches
  - Schema generators: `generateDefaultSchema()`, `generateOrganizationSchema()`, `generateBreadcrumbSchema()`, `generateArticleSchema()`, `generateFaqSchema()`
  - Text utilities: `truncateForMeta()`, `cleanMetaText()`

### 7. Blade Templates
- **`resources/views/partials/seo.blade.php`**: SEO meta tags partial
  - Renders all meta tags with fallbacks
  - Open Graph tags
  - Twitter Card tags
  - Schema.org JSON-LD
  - Canonical URL
  - Robots meta tag

- **`resources/views/layouts/app.blade.php`**: Updated main layout
  - Includes SEO partial in head

## Usage

### 1. Adding SEO to Models
```php
use App\Traits\HasSeo;

class YourModel extends Model
{
    use HasSeo;
    
    // Optional: Override fallback methods
    public function getSeoTitleFallback(): ?string
    {
        return $this->name;
    }
}
```

### 2. Using in Controllers
```php
public function show(Company $company)
{
    $seo = $company->getCachedSeo();
    
    return view('companies.show', compact('company', 'seo'));
}
```

### 3. Using in Blade
```blade
@include('partials.seo', ['seo' => $model->getCachedSeo()])
```

### 4. Filament Resource Integration
```php
use App\Filament\Forms\Components\SeoForm;

public static function form(Schema $schema): Schema
{
    return $schema->schema([
        // Your form fields...
        
        SeoForm::make(), // Full SEO form
        // OR
        SeoForm::minimal(), // Minimal SEO form
    ]);
}

// In CreateRecord/EditRecord pages:
protected function mutateFormDataBeforeFill(array $data): array
{
    if ($this->record->seo) {
        $data['seo'] = $this->record->seo->toArray();
    }
    return $data;
}

protected function mutateFormDataBeforeSave(array $data): array
{
    $seoData = $data['seo'] ?? [];
    unset($data['seo']);
    
    if (!empty($seoData)) {
        $this->record->updateSeo($seoData);
    }
    
    return $data;
}
```

### 5. Generating Schema Markup
```php
use App\Helpers\SeoHelper;

// In your controller
$schema = SeoHelper::generateArticleSchema($article, [
    'headline' => $article->title,
    'description' => $article->excerpt,
]);

// FAQ Schema
$schema = SeoHelper::generateFaqSchema([
    ['question' => 'Question 1?', 'answer' => 'Answer 1'],
    ['question' => 'Question 2?', 'answer' => 'Answer 2'],
]);
```

## Features

✅ Polymorphic SEO - Attach to any model
✅ Complete meta tags support
✅ Open Graph for social sharing
✅ Twitter Cards
✅ Schema.org JSON-LD
✅ Technical SEO (robots, canonical)
✅ Intelligent fallbacks
✅ Caching for performance
✅ Filament integration
✅ Static pages management
✅ Helper functions for common tasks

## Static Pages
Manage SEO for routes like:
- Home
- About Us
- Contact Us
- Privacy Policy
- Terms and Conditions
- Disclaimer

Each page can have its own SEO metadata managed through Filament admin panel.

## Next Steps

1. Run migrations: `php artisan migrate` ✅ (Done)
2. Create static pages in Filament admin
3. Add SEO metadata to existing companies
4. Pass `$seo` variable from controllers to views
5. Configure default OG image in `public/images/default-og-image.jpg`
6. Set up default site description in config

## Cache Management
- SEO data is cached for 1 hour (3600 seconds)
- Automatically cleared when SEO is updated or deleted
- Manually clear: `SeoHelper::clearAllCaches()`
