<?php

namespace App\Filament\Resources\ManageCompanies\Pages;

use App\Filament\Resources\ManageCompanies\ManageCompanyResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditManageCompany extends EditRecord
{
    protected static string $resource = ManageCompanyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
