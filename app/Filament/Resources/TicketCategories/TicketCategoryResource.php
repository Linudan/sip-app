<?php
namespace App\Filament\Resources\TicketCategories;

use App\Filament\Resources\TicketCategories\Pages\ViewTicketCategory;
use App\Filament\Resources\TicketCategories\Pages\CreateTicketCategory;
use App\Filament\Resources\TicketCategories\Pages\EditTicketCategory;
use App\Filament\Resources\TicketCategories\Pages\ListTicketCategories;
use App\Filament\Resources\TicketCategories\Schemas\TicketCategoryForm;
use App\Filament\Resources\TicketCategories\Tables\TicketCategoriesTable;
use App\Filament\Resources\TicketCategories\RelationManagers\TicketsRelationManager;
use App\Models\TicketCategory;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;

class TicketCategoryResource extends Resource
{
    protected static ?string $model = TicketCategory::class;

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
        return __('filament-panels::resources.groups.tikets_group_label');
    }

    // Динамическая надпись в навигации
    public static function getNavigationLabel(): string
    {

        return __('filament-panels::resources.ticket-categories.navigation_label');
    }

    // Иконка в навигации
    protected static string|BackedEnum|null $navigationIcon = Heroicon::Tag;

    // ---ЗАВЕРШЕНИЕ НАСТРОЙКИ НАВИГАЦИИ---

    // Динамическаое название таблицы во единственном числе
    public static function getSingularLabel(): string
    {
        return __('filament-panels::resources.ticket-categories.singular_label');
    }

    // Динамическаое название таблицы во множественном числе
    public static function getPluralLabel(): string
    {
        return __('filament-panels::resources.ticket-categories.plural_label');
    }

    public static function getLabel(): string
    {
        return __('filament-panels::resources.ticket-categories.label');
    }

    // Динамическое название таблицы
    public function getTitle(): string
    {
        return __('filament-panels::resources.ticket-categories.table_title');
    }

    public static function form(Schema $schema): Schema
    {
        return TicketCategoryForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return TicketCategoriesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            TicketsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index'  => ListTicketCategories::route('/'),
            'create' => CreateTicketCategory::route('/create'),
            'view'   => ViewTicketCategory::route('/{record}'),
            'edit'   => EditTicketCategory::route('/{record}/edit'),
        ];
    }
}
