<?php

namespace App\Filament\User\Resources\MyTickets;

use App\Models\Ticket;
use App\Filament\User\Resources\MyTickets\Pages\CreateMyTicket;
use App\Filament\User\Resources\MyTickets\Pages\ListMyTickets;
use App\Filament\User\Resources\MyTickets\Pages\ViewMyTicket;
use App\Filament\User\Resources\MyTickets\Schemas\MyTicketForm;
use App\Filament\User\Resources\MyTickets\Tables\MyTicketsTable;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class MyTicketResource extends Resource
{
    protected static ?string $model = Ticket::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::ClipboardDocumentList;

    public static function getNavigationLabel(): string
    {
        return __('filament-panels::user-panel.my_tickets.navigation_label');
    }

    public static function getPluralLabel(): string
    {
        return __('filament-panels::user-panel.my_tickets.plural_label');
    }

    public static function getSingularLabel(): string
    {
        return __('filament-panels::user-panel.my_tickets.singular_label');
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->where('user_id', Auth::id());
    }

    public static function table(Table $table): Table
    {
        return MyTicketsTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index'  => ListMyTickets::route('/'),
            'create' => CreateMyTicket::route('/create'),
            'view'   => ViewMyTicket::route('/{record}'),
        ];
    }

    public static function canCreate(): bool
    {
        return true;
    }

    public static function canEdit($record): bool
    {
        return false;
    }

    public static function form(Schema $schema): Schema
{
    return MyTicketForm::configure($schema);
}
}
