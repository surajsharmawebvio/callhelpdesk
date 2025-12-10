<?php

namespace App\Filament\Resources\CompanyCategories\Pages;

use App\Filament\Resources\CompanyCategories\CompanyCategoryResource;
use App\Models\CompanyCategory;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Str;

class EditCompanyCategory extends EditRecord
{
    protected static string $resource = CompanyCategoryResource::class;

    // Store sub-category data temporarily
    protected array $tempSubCategoryData = [];

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        // Load existing attached sub-categories
        if ($this->record->is_main) {
            $data['attach_existing_sub_categories'] = $this->record->children()->pluck('id')->toArray();
        }

        return $data;
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        // Store sub-category data temporarily
        $this->tempSubCategoryData = [
            'new_sub_categories' => $data['new_sub_categories'] ?? [],
            'attach_existing_sub_categories' => $data['attach_existing_sub_categories'] ?? [],
        ];

        // Remove from form data so they don't cause errors when saving
        unset($data['new_sub_categories'], $data['attach_existing_sub_categories']);

        return $data;
    }

    protected function afterSave(): void
    {
        $this->handleSubCategories($this->record, $this->tempSubCategoryData);
        
        // Clear temp data
        $this->tempSubCategoryData = [];
    }

    protected function handleSubCategories(CompanyCategory $parentCategory, array $data): void
    {
        $newSubCategories = $data['new_sub_categories'] ?? [];
        $attachExisting = $data['attach_existing_sub_categories'] ?? [];

        // Only process if this is a main category
        if (!$parentCategory->is_main) {
            return;
        }

        // Create new sub-categories
        foreach ($newSubCategories as $subCategoryData) {
            if (!empty($subCategoryData['name'])) {
                $name = trim($subCategoryData['name']);
                $x = $parentCategory->children()->create([
                    'name' => $name,
                    'slug' => Str::slug($name),
                    'parent_id' => $parentCategory->id,
                    'is_main' => false,
                ]);
            }
        }

        // Get currently attached sub-categories
        $currentlyAttached = $parentCategory->children()->pluck('id')->toArray();

        // Attach existing sub-categories (this will move them from other parents if needed)
        if (!empty($attachExisting)) {
            CompanyCategory::whereIn('id', $attachExisting)
                ->update([
                    'parent_id' => $parentCategory->id,
                    'is_main' => false,
                ]);
        }

        // Detach sub-categories that are no longer selected
        $toDetach = array_diff($currentlyAttached, $attachExisting);
        if (!empty($toDetach)) {
            CompanyCategory::whereIn('id', $toDetach)
                ->update(['parent_id' => null]);
        }
    }
}
