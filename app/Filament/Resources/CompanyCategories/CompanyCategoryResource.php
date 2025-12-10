<?php

namespace App\Filament\Resources\CompanyCategories;

use App\Filament\Resources\CompanyCategories\Pages\CreateCompanyCategory;
use App\Filament\Resources\CompanyCategories\Pages\EditCompanyCategory;
use App\Filament\Resources\CompanyCategories\Pages\ListCompanyCategories;
use App\Filament\Resources\CompanyCategories\Schemas\CompanyCategoryForm;
use App\Filament\Resources\CompanyCategories\Tables\CompanyCategoriesTable;
use App\Models\CompanyCategory;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class CompanyCategoryResource extends Resource
{
    protected static ?string $model = CompanyCategory::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $navigationLabel = 'Categories';

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return CompanyCategoryForm::configure($schema);
    }

    public static function mutateFormDataBeforeFill(array $data): array
    {
        // No longer needed since we removed the display field
        return $data;
    }

    public static function table(Table $table): Table
    {
        return CompanyCategoriesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function mutateFormDataBeforeCreate(array $data): array
    {
        $data['new_sub_categories'] = $data['new_sub_categories'] ?? [];
        $data['attach_existing_sub_categories'] = $data['attach_existing_sub_categories'] ?? [];
        unset($data['new_sub_categories'], $data['attach_existing_sub_categories']);

        return $data;
    }

    public static function mutateFormDataBeforeSave(array $data): array
    {
        $data['new_sub_categories'] = $data['new_sub_categories'] ?? [];
        $data['attach_existing_sub_categories'] = $data['attach_existing_sub_categories'] ?? [];
        unset($data['new_sub_categories'], $data['attach_existing_sub_categories']);

        return $data;
    }

    protected static function afterCreate($record, array $data): void
    {
        static::handleSubCategories($record, $data);
    }

    protected static function afterSave($record, array $data): void
    {
        static::handleSubCategories($record, $data);
    }

    protected static function handleSubCategories(CompanyCategory $parentCategory, array $data): void
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
                $parentCategory->children()->create([
                    'name' => $name,
                    'slug' => Str::slug($name),
                    'is_main' => false,
                ]);
            }
        }

        // Get currently attached sub-categories
        $currentlyAttached = $parentCategory->children()->pluck('id')->toArray();

        // Attach existing sub-categories (this will move them from other parents if needed)
        if (!empty($attachExisting)) {
            CompanyCategory::whereIn('id', $attachExisting)
                ->update(['parent_id' => $parentCategory->id]);
        }

        // Detach sub-categories that are no longer selected
        $toDetach = array_diff($currentlyAttached, $attachExisting);
        if (!empty($toDetach)) {
            CompanyCategory::whereIn('id', $toDetach)
                ->update(['parent_id' => null]);
        }
    }

    public static function getPages(): array
    {
        return [
            'index' => ListCompanyCategories::route('/'),
            'create' => CreateCompanyCategory::route('/create'),
            'edit' => EditCompanyCategory::route('/{record}/edit'),
        ];
    }
}
