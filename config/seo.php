<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default SEO Meta Tags
    |--------------------------------------------------------------------------
    |
    | These values will be used as fallbacks when SEO metadata is not set
    | for a specific page or when fields are left empty.
    |
    */

    'default_title' => env('SEO_DEFAULT_TITLE', 'Call Help Desk - Your Trusted Business Directory'),
    
    'default_description' => env('SEO_DEFAULT_DESCRIPTION', 'Find the best companies and services in your area. Browse our comprehensive business directory with reviews, contact information, and detailed company profiles.'),
    
    'default_keywords' => env('SEO_DEFAULT_KEYWORDS', 'business directory, companies, services, reviews, contact information, help desk'),
    
    'default_og_image' => env('SEO_DEFAULT_OG_IMAGE', '/images/default-og-image.jpg'),
    
    'default_og_type' => env('SEO_DEFAULT_OG_TYPE', 'website'),
    
    'default_twitter_card' => env('SEO_DEFAULT_TWITTER_CARD', 'summary_large_image'),
    
    'default_locale' => env('SEO_DEFAULT_LOCALE', 'en_US'),
    
    'default_robots' => env('SEO_DEFAULT_ROBOTS', 'index, follow'),
    
    /*
    |--------------------------------------------------------------------------
    | Site Information
    |--------------------------------------------------------------------------
    */
    
    'site_name' => env('SEO_SITE_NAME', config('app.name')),
    
    'twitter_site' => env('SEO_TWITTER_SITE', '@callhelpdesk'),
    
    'twitter_creator' => env('SEO_TWITTER_CREATOR', '@callhelpdesk'),
    
    /*
    |--------------------------------------------------------------------------
    | Title Templates
    |--------------------------------------------------------------------------
    |
    | Define how page titles should be formatted
    |
    */
    
    'title_separator' => env('SEO_TITLE_SEPARATOR', ' - '),
    
    'append_site_name' => env('SEO_APPEND_SITE_NAME', true),
    
    /*
    |--------------------------------------------------------------------------
    | Organization Schema
    |--------------------------------------------------------------------------
    |
    | Default organization information for schema markup
    |
    */
    
    'organization' => [
        'name' => env('SEO_ORG_NAME', config('app.name')),
        'url' => env('SEO_ORG_URL', config('app.url')),
        'logo' => env('SEO_ORG_LOGO', '/images/logo.png'),
        'same_as' => [
            // Add your social media URLs here
            // 'https://facebook.com/yourpage',
            // 'https://twitter.com/yourprofile',
        ],
    ],

];
