<?php

namespace App\Filament\Resources\Inquiries\Pages;

use App\Filament\Resources\Inquiries\InquiriesResource;
use Filament\Resources\Pages\ListRecords;

class ListInquiries extends ListRecords
{
    protected static string $resource = InquiriesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            //
        ];
    }
}
