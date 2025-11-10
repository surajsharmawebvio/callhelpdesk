<?php

namespace App\Filament\Resources\ManageCompanies\Pages;

use App\Filament\Resources\ManageCompanies\ManageCompanyResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListManageCompanies extends ListRecords
{
    protected static string $resource = ManageCompanyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
