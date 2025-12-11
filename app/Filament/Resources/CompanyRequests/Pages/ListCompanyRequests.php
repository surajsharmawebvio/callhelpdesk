<?php

namespace App\Filament\Resources\CompanyRequests\Pages;

use App\Filament\Resources\CompanyRequests\CompanyRequestResource;
use Filament\Resources\Pages\ListRecords;

class ListCompanyRequests extends ListRecords
{
    protected static string $resource = CompanyRequestResource::class;

    protected function getHeaderActions(): array
    {
        return [
            //
        ];
    }
}
