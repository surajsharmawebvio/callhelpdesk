<?php

namespace App\Filament\Resources\ManageCompanies;

use App\Filament\Resources\ManageCompanies\Pages\CreateManageCompany;
use App\Filament\Resources\ManageCompanies\Pages\EditManageCompany;
use App\Filament\Resources\ManageCompanies\Pages\ListManageCompanies;
use App\Filament\Resources\ManageCompanies\Schemas\ManageCompanyForm;
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

    protected static ?string $recordTitleAttribute = 'Company';

    public static function form(Schema $schema): Schema
    {
        return ManageCompanyForm::configure($schema);
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
