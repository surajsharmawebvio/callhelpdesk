<?php

namespace App\Filament\Resources\StaticPages\Pages;

use App\Filament\Resources\StaticPages\StaticPageResource;
use Filament\Resources\Pages\CreateRecord;

class CreateStaticPage extends CreateRecord
{
    protected static string $resource = StaticPageResource::class;

    protected array $seoData = [];

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // Extract SEO data
        $seoData = $data['seo'] ?? [];
        unset($data['seo']);

        // Store SEO data temporarily to create after page is created
        $this->seoData = $seoData;

        return $data;
    }

    protected function afterCreate(): void
    {
        // Create SEO metadata after static page is created
        if (!empty($this->seoData)) {
            $this->record->updateSeo($this->seoData);
        }
    }
}
