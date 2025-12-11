<?php

namespace App\Filament\Resources\CompanyRequests;

use App\Filament\Resources\CompanyRequests\Pages\EditCompanyRequest;
use App\Filament\Resources\CompanyRequests\Pages\ListCompanyRequests;
use App\Filament\Resources\CompanyRequests\Schemas\CompanyRequestForm;
use App\Filament\Resources\CompanyRequests\Tables\CompanyRequestsTable;
use App\Models\CompanyRequest;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class CompanyRequestResource extends Resource
{
    protected static ?string $model = CompanyRequest::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;
    
    protected static ?string $navigationLabel = 'Company Requests';
    
    protected static ?string $modelLabel = 'Company Request';
    
    protected static ?string $pluralModelLabel = 'Company Requests';
    
    protected static ?int $navigationSort = 2;

    public static function canCreate(): bool
    {
        return false;
    }

    public static function form(Schema $schema): Schema
    {
        return CompanyRequestForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CompanyRequestsTable::configure($table);
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
            'index' => ListCompanyRequests::route('/'),
        ];
    }
}
