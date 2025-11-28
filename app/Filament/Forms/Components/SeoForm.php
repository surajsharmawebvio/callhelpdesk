<?php

namespace App\Filament\Forms\Components;

use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\KeyValue;

class SeoForm
{
    /**
     * Get the complete SEO form section.
     */
    public static function make(): Section
    {
        return Section::make('SEO Settings')
            ->schema([
                Tabs::make('SEO Tabs')
                    ->tabs([
                        Tab::make('Basic Meta')
                            ->schema(self::basicMetaFields()),
                        
                        Tab::make('Open Graph')
                            ->schema(self::openGraphFields()),
                        
                        Tab::make('Twitter Card')
                            ->schema(self::twitterCardFields()),
                        
                        Tab::make('Technical SEO')
                            ->schema(self::technicalSeoFields()),
                        
                        Tab::make('Schema Markup')
                            ->schema(self::schemaMarkupFields()),
                    ])
                    ->columnSpanFull(),
            ])
            ->collapsible()
            ->collapsed(false);
    }

    /**
     * Basic meta fields.
     */
    protected static function basicMetaFields(): array
    {
        return [
            TextInput::make('seo.meta_title')
                ->label('Meta Title')
                ->placeholder('Leave empty to use default title')
                ->maxLength(60)
                ->helperText('Recommended: 50-60 characters')
                ->columnSpanFull(),

            Textarea::make('seo.meta_description')
                ->label('Meta Description')
                ->placeholder('Leave empty to use default description')
                ->maxLength(160)
                ->rows(3)
                ->helperText('Recommended: 150-160 characters')
                ->columnSpanFull(),

            Textarea::make('seo.meta_keywords')
                ->label('Meta Keywords')
                ->placeholder('keyword1, keyword2, keyword3')
                ->maxLength(255)
                ->rows(2)
                ->helperText('Comma-separated keywords (optional)')
                ->columnSpanFull(),
        ];
    }

    /**
     * Open Graph fields for social sharing.
     */
    protected static function openGraphFields(): array
    {
        return [
            TextInput::make('seo.og_title')
                ->label('OG Title')
                ->placeholder('Leave empty to use meta title')
                ->maxLength(95)
                ->helperText('Recommended: 60-95 characters')
                ->columnSpanFull(),

            Textarea::make('seo.og_description')
                ->label('OG Description')
                ->placeholder('Leave empty to use meta description')
                ->maxLength(200)
                ->rows(3)
                ->helperText('Recommended: 110-200 characters')
                ->columnSpanFull(),

            FileUpload::make('seo.og_image')
                ->label('OG Image')
                ->image()
                ->disk('public')
                ->directory('seo/og-images')
                ->visibility('public')
                ->imageEditor()
                ->imageEditorAspectRatios([
                    '1.91:1', // Facebook recommended
                ])
                ->maxSize(5120)
                ->helperText('Recommended: 1200x630px (1.91:1 ratio)')
                ->columnSpanFull(),

            TextInput::make('seo.og_type')
                ->label('OG Type')
                ->default('website')
                ->placeholder('website, article, product, etc.')
                ->maxLength(50)
                ->columnSpanFull(),
        ];
    }

    /**
     * Twitter Card fields.
     */
    protected static function twitterCardFields(): array
    {
        return [
            TextInput::make('seo.twitter_card')
                ->label('Twitter Card Type')
                ->default('summary_large_image')
                ->placeholder('summary, summary_large_image')
                ->maxLength(50)
                ->helperText('Type of Twitter card')
                ->columnSpanFull(),

            TextInput::make('seo.twitter_title')
                ->label('Twitter Title')
                ->placeholder('Leave empty to use OG title')
                ->maxLength(70)
                ->helperText('Recommended: max 70 characters')
                ->columnSpanFull(),

            Textarea::make('seo.twitter_description')
                ->label('Twitter Description')
                ->placeholder('Leave empty to use OG description')
                ->maxLength(200)
                ->rows(3)
                ->helperText('Recommended: max 200 characters')
                ->columnSpanFull(),

            FileUpload::make('seo.twitter_image')
                ->label('Twitter Image')
                ->image()
                ->disk('public')
                ->directory('seo/twitter-images')
                ->visibility('public')
                ->imageEditor()
                ->imageEditorAspectRatios([
                    '2:1', // Twitter summary_large_image
                    '1:1', // Twitter summary
                ])
                ->maxSize(5120)
                ->helperText('summary_large_image: 800x418px | summary: 120x120px')
                ->columnSpanFull(),

            TextInput::make('seo.twitter_site')
                ->label('Twitter Site')
                ->placeholder('@yourusername')
                ->maxLength(50)
                ->helperText('Twitter username of website (e.g., @yoursite)')
                ->columnSpanFull(),

            TextInput::make('seo.twitter_creator')
                ->label('Twitter Creator')
                ->placeholder('@creatorusername')
                ->maxLength(50)
                ->helperText('Twitter username of content creator')
                ->columnSpanFull(),
        ];
    }

    /**
     * Technical SEO fields.
     */
    protected static function technicalSeoFields(): array
    {
        return [
            TextInput::make('seo.canonical_url')
                ->label('Canonical URL')
                ->url()
                ->placeholder('https://example.com/page')
                ->helperText('Leave empty to auto-generate from current URL')
                ->columnSpanFull(),

            Toggle::make('seo.index')
                ->label('Allow Search Engine Indexing')
                ->default(true)
                ->helperText('Allow search engines to index this page')
                ->inline(false)
                ->columnSpanFull(),

            Toggle::make('seo.follow')
                ->label('Allow Following Links')
                ->default(true)
                ->helperText('Allow search engines to follow links on this page')
                ->inline(false)
                ->columnSpanFull(),

            TextInput::make('seo.locale')
                ->label('Locale')
                ->default('en_US')
                ->placeholder('en_US, fr_FR, es_ES')
                ->maxLength(10)
                ->helperText('Language and region code (e.g., en_US)')
                ->columnSpanFull(),

            TextInput::make('seo.priority')
                ->label('Sitemap Priority')
                ->numeric()
                ->minValue(0.0)
                ->maxValue(1.0)
                ->step(0.1)
                ->default(0.5)
                ->helperText('Sitemap priority (0.0 - 1.0, default: 0.5)')
                ->columnSpanFull(),
        ];
    }

    /**
     * Schema markup fields.
     */
    protected static function schemaMarkupFields(): array
    {
        return [
            Textarea::make('auto_generated_schema_preview')
                ->label('Auto-Generated Schema Preview')
                ->placeholder('Auto-generated schema will appear here...')
                ->rows(10)
                ->disabled()
                ->helperText('This is a preview of the default schema markup. You can edit the full schema in the field below.')
                ->columnSpanFull()
                ->formatStateUsing(function ($state, $record) {
                    if (!$record) {
                        return 'Save the page first to see auto-generated schema markup.';
                    }
                    
                    // Check if the model has the generateDefaultSchemaMarkup method
                    if (!method_exists($record, 'generateDefaultSchemaMarkup')) {
                        return 'Auto-generated schema is only available for static pages.';
                    }
                    
                    // Get the auto-generated schema from the model
                    $schema = $record->generateDefaultSchemaMarkup();
                    return json_encode($schema, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
                }),

            Textarea::make('seo.schema_markup_json')
                ->label('Edit Schema Markup (JSON)')
                ->placeholder('Enter custom JSON-LD schema markup...')
                ->rows(20)
                ->helperText('Edit the complete schema markup in JSON format. Leave empty to use auto-generated schema. This will override the default schema.')
                ->columnSpanFull()
                ->formatStateUsing(function ($state, $record) {
                    // If there's saved JSON schema, show it
                    if ($state) {
                        return is_string($state) ? $state : json_encode($state, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
                    }
                    
                    // Otherwise show the auto-generated schema for editing (only for models that support it)
                    if ($record && method_exists($record, 'generateDefaultSchemaMarkup')) {
                        $schema = $record->generateDefaultSchemaMarkup();
                        return json_encode($schema, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
                    }
                    
                    return null;
                })
                ->dehydrateStateUsing(function ($state) {
                    // Convert JSON string to array before saving
                    if (empty($state)) {
                        return null;
                    }
                    
                    $decoded = json_decode($state, true);
                    if (json_last_error() !== JSON_ERROR_NONE) {
                        // If invalid JSON, return null or throw validation error
                        return null;
                    }
                    
                    return $decoded;
                }),
        ];
    }

    /**
     * Get minimal SEO form (for simple resources).
     */
    public static function minimal(): Section
    {
        return Section::make('SEO Settings')
            ->schema([
                TextInput::make('seo.meta_title')
                    ->label('Meta Title')
                    ->placeholder('Leave empty to use default title')
                    ->maxLength(60)
                    ->columnSpanFull(),

                Textarea::make('seo.meta_description')
                    ->label('Meta Description')
                    ->placeholder('Leave empty to use default description')
                    ->maxLength(160)
                    ->rows(3)
                    ->columnSpanFull(),

                FileUpload::make('seo.og_image')
                    ->label('Social Share Image')
                    ->image()
                    ->disk('public')
                    ->directory('seo/og-images')
                    ->visibility('public')
                    ->columnSpanFull(),

                Toggle::make('seo.index')
                    ->label('Allow Search Engine Indexing')
                    ->default(true)
                    ->inline(false)
                    ->columnSpanFull(),
            ])
            ->collapsible()
            ->collapsed(true);
    }
}
