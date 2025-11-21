<?php

namespace App\Filament\Resources\StaticPages\Pages;

use App\Filament\Resources\StaticPages\StaticPageResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditStaticPage extends EditRecord
{
    protected static string $resource = StaticPageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        // Load SEO relationship data
        if ($this->record->seo) {
            $data['seo'] = $this->record->seo->toArray();
        }

        return $data;
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        // Extract SEO data
        $seoData = $data['seo'] ?? [];
        unset($data['seo']);

        // Update or create SEO metadata
        if (!empty($seoData)) {
            $this->record->updateSeo($seoData);
        }

        return $data;
    }
}
