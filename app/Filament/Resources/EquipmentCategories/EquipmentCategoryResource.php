<?php

namespace App\Filament\Resources\EquipmentCategories;

use App\Filament\Resources\EquipmentCategories\Pages\CreateEquipmentCategory;
use App\Filament\Resources\EquipmentCategories\Pages\EditEquipmentCategory;
use App\Filament\Resources\EquipmentCategories\Pages\ListEquipmentCategories;
use App\Filament\Resources\EquipmentCategories\Schemas\EquipmentCategoryForm;
use App\Filament\Resources\EquipmentCategories\Tables\EquipmentCategoriesTable;
use App\Models\EquipmentCategory;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class EquipmentCategoryResource extends Resource
{
    protected static ?string $model = EquipmentCategory::class;

    // Динамическая надпись
    public static function getNavigationLabel(): string {

    return __('filament-panels::resources.equipment-сategories.navigation_label');
    }

    // Иконка
    protected static string|BackedEnum|null $navigationIcon = Heroicon::Tag;

    // Можно сделать потом динамическую надпись для поддержки языков
    // Динамическая надпись
    public static function getNavigationGroup(): ?string {
    return __('filament-panels::resources.groups.equipments_group_label');
    }

    public static function form(Schema $schema): Schema
    {
        return EquipmentCategoryForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return EquipmentCategoriesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListEquipmentCategories::route('/'),
            'create' => CreateEquipmentCategory::route('/create'),
            'edit' => EditEquipmentCategory::route('/{record}/edit'),
        ];
    }
}
