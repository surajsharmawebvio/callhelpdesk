<?php

namespace App\Filament\Resources\PopularCompanies\Schemas;

use App\Models\Company;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class PopularCompanyForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('company_id')
                    ->label('Company')
                    ->options(Company::all()->pluck('name', 'id'))
                    ->required()
                    ->searchable(),
                TextInput::make('order')
                    ->label('Order')
                    ->numeric()
                    ->default(0)
                    ->required(),
            ]);
    }
}
