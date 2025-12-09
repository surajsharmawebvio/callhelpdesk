<?php

namespace App\Filament\Resources\PopularCompanies\Pages;

use App\Filament\Resources\PopularCompanies\PopularCompanyResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPopularCompanies extends ListRecords
{
    protected static string $resource = PopularCompanyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
