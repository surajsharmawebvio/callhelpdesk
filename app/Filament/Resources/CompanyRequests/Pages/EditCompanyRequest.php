<?php

namespace App\Filament\Resources\CompanyRequests\Pages;

use App\Filament\Resources\CompanyRequests\CompanyRequestResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditCompanyRequest extends EditRecord
{
    protected static string $resource = CompanyRequestResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
