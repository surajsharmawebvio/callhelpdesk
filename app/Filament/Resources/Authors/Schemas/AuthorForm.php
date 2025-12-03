<?php

namespace App\Filament\Resources\Authors\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class AuthorForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Author Information')
                    ->schema([
                        TextInput::make('name')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Enter author name'),
                        
                        TextInput::make('designation')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('e.g., Founder & Developer'),
                        
                        Textarea::make('bio')
                            ->required()
                            ->rows(4)
                            ->placeholder('Enter a brief bio about the author'),
                        
                        FileUpload::make('profile_image')
                            ->image()
                            ->disk('public')
                            ->maxSize(2048)
                            ->imageEditor()
                            ->label('Profile Image'),
                    ])->columns(2),
                
                Section::make('Social Media Links')
                    ->schema([
                        TextInput::make('linkedin_url')
                            ->url()
                            ->placeholder('https://linkedin.com/in/username')
                            ->label('LinkedIn URL'),
                        
                        TextInput::make('twitter_url')
                            ->url()
                            ->placeholder('https://twitter.com/username')
                            ->label('Twitter URL'),
                        
                        TextInput::make('github_url')
                            ->url()
                            ->placeholder('https://github.com/username')
                            ->label('GitHub URL'),
                        
                        TextInput::make('website_url')
                            ->url()
                            ->placeholder('https://example.com')
                            ->label('Website URL'),
                    ])->columns(2),
                
                Section::make('Settings')
                    ->schema([
                        TextInput::make('order')
                            ->numeric()
                            ->default(0)
                            ->label('Display Order')
                            ->helperText('Lower numbers appear first'),
                        
                        Toggle::make('is_active')
                            ->default(true)
                            ->label('Active')
                            ->helperText('Only active authors will be displayed'),
                    ])->columns(2),
            ]);
    }
}
