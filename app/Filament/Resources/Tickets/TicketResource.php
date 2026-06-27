<?php
namespace App\Filament\Resources\Tickets;

use App\Filament\Resources\Tickets\RelationManagers\TicketAssignmentsRelationManager;
use App\Filament\Resources\Tickets\Pages\ViewTicket;
use App\Filament\Resources\Tickets\Pages\CreateTicket;
use App\Filament\Resources\Tickets\Pages\EditTicket;
use App\Filament\Resources\Tickets\Pages\ListTickets;
use App\Filament\Resources\Tickets\Schemas\TicketForm;
use App\Filament\Resources\Tickets\Tables\TicketsTable;
use App\Models\Ticket;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TicketResource extends Resource
{
    protected static ?string $model = Ticket::class;

    // ---НАСТРОЙКА ПЛАГИНА ГЛОБАЛЬНОГО ПОИСКА---

    // Включение глобального поиска (GlobalSearchModal) для ресурса
    public static function getGloballySearchableAttributes(): array
    {
        return ['ticket_number', 'title', 'priority'];
    }

    // Изменение Title-а при поиске (чтобы не выводилось просто название)
    public static function getGlobalSearchResultTitle(Model $record): string
    {
        // Теперь $record гарантированно является экземпляром, но тип параметра — Model
        return $record->title;
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

        return __('filament-panels::resources.tikets.navigation_label');
    }

    // Иконка в навигации
    protected static string|BackedEnum|null $navigationIcon = Heroicon::ClipboardDocument;

    // ---ЗАВЕРШЕНИЕ НАСТРОЙКИ НАВИГАЦИИ---

    // Динамическаое название таблицы во единственном числе
    public static function getSingularLabel(): string
    {
        return __('filament-panels::resources.tikets.singular_label');
    }

    // Динамическаое название таблицы во множественном числе
    public static function getPluralLabel(): string
    {
        return __('filament-panels::resources.tikets.plural_label');
    }

    public static function getLabel(): string
    {
        return __('filament-panels::resources.tikets.label');
    }

    // Динамическое название таблицы
    public function getTitle(): string
    {
        return __('filament-panels::resources.tikets.table_title');
    }

    public static function form(Schema $schema): Schema
    {
        return TicketForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return TicketsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            TicketAssignmentsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index'  => ListTickets::route('/'),
            'create' => CreateTicket::route('/create'),
            'view'   => ViewTicket::route('/{record}'),
            'edit'   => EditTicket::route('/{record}/edit'),
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
