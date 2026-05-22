<?php
namespace App\Filament\Resources\EquipmentItems;

use App\Filament\Resources\Departments\Pages\ViewEquipmentItem as PagesViewEquipmentItem;
use App\Filament\Resources\EquipmentItem\Pages\ViewEquipmentItem as EquipmentItemPagesViewEquipmentItem;
use App\Filament\Resources\EquipmentItems\Pages\ViewEquipmentItem;
use App\Filament\Resources\EquipmentItems\Pages\CreateEquipmentItem;
use App\Filament\Resources\EquipmentItems\Pages\EditEquipmentItem;
use App\Filament\Resources\EquipmentItems\Pages\ListEquipmentItems;
use App\Filament\Resources\EquipmentItems\Schemas\EquipmentItemForm;
use App\Filament\Resources\EquipmentItems\Tables\EquipmentItemsTable;
use App\Models\EquipmentItem;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EquipmentItemResource extends Resource
{
    protected static ?string $model = EquipmentItem::class;

    // ---НАСТРОЙКА ПЛАГИНА ГЛОБАЛЬНОГО ПОИСКА---

    // Включение глобального поиска (GlobalSearchModal) для ресурса
    public static function getGloballySearchableAttributes(): array
    {
        return ['name', 'inventory_number', 'serial_number', 'manufacturer', 'model', 'status'];
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

        return __('filament-panels::resources.equipments.navigation_label');
    }

    // Иконка в навигации
    protected static string|BackedEnum|null $navigationIcon = Heroicon::ComputerDesktop;

    // ---ЗАВЕРШЕНИЕ НАСТРОЙКИ НАВИГАЦИИ---


    // Динамическаое название таблицы во единственном числе
    public static function getSingularLabel(): string
    {
        return __('filament-panels::resources.equipments.singular_label');
    }

    // Динамическаое название таблицы во множественном числе
    public static function getPluralLabel(): string
    {
        return __('filament-panels::resources.equipments.plural_label');
    }

    // Динамическое название таблицы
    public static function getLabel(): string
    {
        return __('filament-panels::resources.equipments.label');
    }

    // Динамическое название таблицы
    public function getTitle(): string
    {
        return __('filament-panels::resources.departments.table_title');
    }

    public static function form(Schema $schema): Schema
    {
        return EquipmentItemForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return EquipmentItemsTable::configure($table);
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
            'index'  => ListEquipmentItems::route('/'),
            'create' => CreateEquipmentItem::route('/create'),
            'view'   => ViewEquipmentItem::route('/{record}'),
            'edit'   => EditEquipmentItem::route('/{record}/edit'),
        ];
    }

    public static function getRecordRouteBindingEloquentQuery(): Builder
    {
        return parent::getRecordRouteBindingEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
