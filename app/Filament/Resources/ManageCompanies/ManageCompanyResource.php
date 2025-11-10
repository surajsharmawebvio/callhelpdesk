<?php

namespace App\Filament\Resources\ManageCompanies;

use App\Filament\Resources\ManageCompanies\Pages\CreateManageCompany;
use App\Filament\Resources\ManageCompanies\Pages\EditManageCompany;
use App\Filament\Resources\ManageCompanies\Pages\ListManageCompanies;
use App\Filament\Resources\ManageCompanies\Tables\ManageCompaniesTable;
use App\Models\Company;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ManageCompanyResource extends Resource
{
    protected static ?string $model = Company::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return $schema->components(self::getFormSchema());
    }

    public static function getFormSchema(): array
    {
        return [
            \Filament\Forms\Components\TextInput::make('name')
                ->label('Company Name')
                ->required()
                ->maxLength(255),

            \Filament\Forms\Components\TextInput::make('phone')
                ->label('Phone Number')
                ->required()
                ->maxLength(255),

            \Filament\Forms\Components\TextInput::make('url')
                ->label('URL')
                ->required()
                ->maxLength(255),

            \Filament\Forms\Components\TextInput::make('ulpad')
                ->label('ULPAD')
                ->maxLength(255),

            \Filament\Forms\Components\TextInput::make('ad_id')
                ->label('Ad ID')
                ->numeric()
                ->default(0),

            \Filament\Forms\Components\TextInput::make('popup_id')
                ->label('Popup ID')
                ->numeric()
                ->default(0),

            \Filament\Forms\Components\RichEditor::make('content')
                ->label('Content')
                ->required()
                ->columnSpanFull(),
        ];
    }

    public static function table(Table $table): Table
    {
        return ManageCompaniesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListManageCompanies::route('/'),
            'create' => CreateManageCompany::route('/create'),
            'edit' => EditManageCompany::route('/{record}/edit'),
        ];
    }
}
