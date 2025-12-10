<?php

namespace App\Filament\Resources\CompanyCategories\Schemas;

use App\Models\CompanyCategory;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
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

                Toggle::make('is_main')
                    ->label('Is Main Category')
                    ->default(true)
                    ->helperText('Check if this is a main category, uncheck if it\'s a subcategory'),

                Select::make('parent_id')
                    ->label('Parent Category')
                    ->options(fn () => CompanyCategory::where('is_main', true)->pluck('name', 'id'))
                    ->searchable()
                    ->placeholder('None (This will be a main category)')
                    ->helperText('Leave empty to create a main category, or select a parent to create a subcategory')
                    ->visible(fn ($get) => !$get('is_main')),

                Repeater::make('new_sub_categories')
                    ->label('Add New Sub Categories')
                    ->schema([
                        TextInput::make('name')
                            ->label('Sub Category Name')
                            ->required()
                            ->maxLength(255),
                    ])
                    ->columns(1)
                    ->collapsible()
                    ->collapsed()
                    ->addActionLabel('Add New Sub Category')
                    ->helperText('Add new sub-categories that will be created for this category')
                    ->visible(fn ($get) => $get('is_main')),

                Select::make('attach_existing_sub_categories')
                    ->label('Attach Existing Sub Categories')
                    ->multiple()
                    ->options(fn () => CompanyCategory::where('is_main', false)->pluck('name', 'id'))
                    ->searchable()
                    ->helperText('Select existing sub-categories to attach to this category')
                    ->visible(fn ($get) => $get('is_main')),
            ]);
    }
}
