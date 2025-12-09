<?php

namespace App\Filament\Resources\PopularCompanies\Pages;

use App\Filament\Resources\PopularCompanies\PopularCompanyResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditPopularCompany extends EditRecord
{
    protected static string $resource = PopularCompanyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
