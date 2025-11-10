<?php

namespace App\Filament\Resources\ManageCompanies\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\RichEditor;
use Filament\Schemas\Schema;

class ManageCompanyForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Company Name')
                    ->required()
                    ->maxLength(255),

                TextInput::make('phone')
                    ->label('Phone Number')
                    ->required()
                    ->maxLength(255),

                TextInput::make('url')
                    ->label('URL')
                    ->required()
                    ->maxLength(255),

                TextInput::make('ulpad')
                    ->label('ULPAD')
                    ->maxLength(255),

                TextInput::make('ad_id')
                    ->label('Ad ID')
                    ->numeric()
                    ->default(0),

                TextInput::make('popup_id')
                    ->label('Popup ID')
                    ->numeric()
                    ->default(0),

                RichEditor::make('content')
                    ->label('Content')
                    ->required()
                    ->columnSpanFull(),
            ]);
    }
}
