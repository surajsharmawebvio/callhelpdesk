<?php

namespace App\Filament\Resources\PopularCompanies;

use App\Filament\Resources\PopularCompanies\Pages\CreatePopularCompany;
use App\Filament\Resources\PopularCompanies\Pages\EditPopularCompany;
use App\Filament\Resources\PopularCompanies\Pages\ListPopularCompanies;
use App\Filament\Resources\PopularCompanies\Schemas\PopularCompanyForm;
use App\Filament\Resources\PopularCompanies\Tables\PopularCompaniesTable;
use App\Models\PopularCompany;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class PopularCompanyResource extends Resource
{
    protected static ?string $model = PopularCompany::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $navigationLabel = 'Popular Companies';

    protected static ?string $recordTitleAttribute = 'company.name';

    public static function form(Schema $schema): Schema
    {
        return PopularCompanyForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PopularCompaniesTable::configure($table);
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
            'index' => ListPopularCompanies::route('/'),
            'create' => CreatePopularCompany::route('/create'),
            'edit' => EditPopularCompany::route('/{record}/edit'),
        ];
    }
}
