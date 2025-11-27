<?php

namespace App\Filament\Resources\StaticPages\Schemas;

use App\Filament\Forms\Components\SeoForm;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use App\Forms\Components\CustomRichEditor;
use Webvio\FilamentLinkNofollow\Plugins\CustomLinkPlugin;

class StaticPageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(1)
            ->schema([
                Section::make('Page Selection')
                    ->description('Select the page you want to manage SEO tags for')
                    ->schema([
                        Select::make('route_name')
                            ->label('Page Route')
                            ->options([
                                'home' => 'Home',
                                'about-us' => 'About Us',
                                'contact-us' => 'Contact Us',
                                'privacy-policy' => 'Privacy Policy',
                                'terms-and-conditions' => 'Terms and Conditions',
                                'disclaimer' => 'Disclaimer',
                                'sitemap' => 'Sitemap',
                            ])
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->searchable()
                            ->helperText('Select the page to manage SEO settings'),

                        Toggle::make('published')
                            ->label('Published')
                            ->default(true)
                            ->helperText('Toggle to publish or unpublish SEO tags for this page'),
                    ]),

                // SEO Settings
                SeoForm::make(),
            ]);
    }
}
