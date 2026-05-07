<?php

namespace App\Filament\User\Resources\MyTickets;

use App\Models\Ticket;
use App\Filament\User\Resources\MyTickets\Pages\ListMyTickets;
use App\Filament\User\Resources\MyTickets\Pages\ViewMyTicket;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class MyTicketResource extends Resource
{
    protected static ?string $model = Ticket::class;

    protected static string|BackedEnum|null $navigationIcon =  Heroicon::ClipboardDocumentList;

    protected static ?string $navigationLabel = 'Мои заявки';

    protected static ?string $pluralLabel = 'Заявки';

    protected static ?string $slug = 'my-tickets';

    public static function canCreate(): bool
    {
        return false;
    }

    public static function canEdit($record): bool
    {
        return false;
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->where('user_id', Auth::id());
    }

    public static function table(Table $table): Table
    {
        return \App\Filament\User\Resources\MyTickets\Tables\MyTicketsTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListMyTickets::route('/'),
            'view'  => ViewMyTicket::route('/{record}'),
        ];
    }
}
