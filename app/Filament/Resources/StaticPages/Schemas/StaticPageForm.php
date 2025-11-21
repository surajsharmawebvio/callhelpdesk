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
                Section::make('Page Details')
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
                            ])
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->searchable()
                            ->helperText('Select the route this page represents'),

                        TextInput::make('title')
                            ->label('Page Title')
                            ->required()
                            ->maxLength(255),

                        CustomRichEditor::make('content')
                            ->label('Content')
                            ->required()
                            ->toolbarButtons([
                                ['bold', 'italic', 'underline', 'strike', 'subscript', 'superscript', 'link'],
                                ['h2', 'h3', 'alignStart', 'alignCenter', 'alignEnd'],
                                ['blockquote', 'codeBlock', 'bulletList', 'orderedList'],
                                ['table', 'attachFiles'],
                                ['undo', 'redo'],
                            ])
                            ->plugins([
                                CustomLinkPlugin::make(),
                            ])
                            ->columnSpanFull(),

                        Toggle::make('published')
                            ->label('Published')
                            ->default(true)
                            ->helperText('Toggle to publish or unpublish this page'),
                    ]),

                // SEO Settings
                SeoForm::make(),
            ]);
    }
}
