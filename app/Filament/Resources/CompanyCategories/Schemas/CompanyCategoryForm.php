<?php

namespace App\Filament\Resources\CompanyCategories\Schemas;

use App\Models\CompanyCategory;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class CompanyCategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Category Name')
                    ->required()
                    ->maxLength(255),

                Select::make('parent_id')
                    ->label('Parent Category')
                    ->options(CompanyCategory::whereNull('parent_id')->pluck('name', 'id'))
                    ->searchable()
                    ->placeholder('None (This will be a main category)')
                    ->helperText('Leave empty to create a main category, or select a parent to create a subcategory'),
            ]);
    }
}
