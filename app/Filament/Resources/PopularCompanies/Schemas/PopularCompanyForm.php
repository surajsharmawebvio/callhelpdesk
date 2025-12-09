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
                    ->options(function ($record) {
                        $query = Company::where('published', true);

                        if ($record) {
                            // When editing, exclude the current company's ID from the "already linked" check
                            $query->whereDoesntHave('popularCompany', function ($q) use ($record) {
                                $q->where('id', '!=', $record->id);
                            });
                        } else {
                            // When creating, exclude all companies that already have popular companies
                            $query->whereDoesntHave('popularCompany');
                        }

                        return $query->pluck('name', 'id');
                    })
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
