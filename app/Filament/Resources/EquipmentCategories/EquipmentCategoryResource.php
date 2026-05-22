<?php
namespace App\Filament\Resources\EquipmentCategories;

use App\Filament\Resources\EquipmentCategories\Pages\ViewEquipmentCategory;
use App\Filament\Resources\EquipmentCategories\Pages\CreateEquipmentCategory;
use App\Filament\Resources\EquipmentCategories\Pages\EditEquipmentCategory;
use App\Filament\Resources\EquipmentCategories\Pages\ListEquipmentCategories;
use App\Filament\Resources\EquipmentCategories\Schemas\EquipmentCategoryForm;
use App\Filament\Resources\EquipmentCategories\Tables\EquipmentCategoriesTable;
use App\Filament\Resources\UserResource\RelationManagers\EquipmentItemsRelationManager;
use App\Models\EquipmentCategory;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;

class EquipmentCategoryResource extends Resource
{
    protected static ?string $model = EquipmentCategory::class;

    // ---НАСТРОЙКА ПЛАГИНА ГЛОБАЛЬНОГО ПОИСКА---

    // Включение глобального поиска (GlobalSearchModal) для ресурса
    public static function getGloballySearchableAttributes(): array
    {
        return ['name'];
    }

    // Изменение Title-а при поиске (чтобы не выводилось просто название)
    public static function getGlobalSearchResultTitle(Model $record): string
    {
        // Теперь $record гарантированно является экземпляром, но тип параметра — Model
        return $record->name;
    }

    // ---ЗАВЕРШЕНИЕ НАСТРОЙКИ ПЛАГИНА ГЛОБАЛЬНОГО ПОИСКА---


    // ---НАСТРОЙКА НАВИГАЦИИ---

    // Группа навигации
    public static function getNavigationGroup(): ?string
    {
        return __('filament-panels::resources.groups.equipments_group_label');
    }

    // Динамическая надпись в навигации
    public static function getNavigationLabel(): string
    {

        return __('filament-panels::resources.equipment-сategories.navigation_label');
    }

    // Иконка в навигации
    protected static string|BackedEnum|null $navigationIcon = Heroicon::Tag;

    // ---ЗАВЕРШЕНИЕ НАСТРОЙКИ НАВИГАЦИИ---


    // Динамическаое название таблицы во единственном числе
    public static function getSingularLabel(): string
    {
        return __('filament-panels::resources.equipment-сategories.singular_label');
    }

    // Динамическаое название таблицы во множественном числе
    public static function getPluralLabel(): string
    {
        return __('filament-panels::resources.equipment-сategories.plural_label');
    }

    public static function getLabel(): string
    {
        return __('filament-panels::resources.equipment-сategories.label');
    }

    // Динамическое название таблицы
    public function getTitle(): string
    {
        return __('filament-panels::resources.equipment-сategories.table_title');
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
            EquipmentItemsRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index'  => ListEquipmentCategories::route('/'),
            'create' => CreateEquipmentCategory::route('/create'),
            'view'   => ViewEquipmentCategory::route('/{record}'),
            'edit'   => EditEquipmentCategory::route('/{record}/edit'),
        ];
    }
}
