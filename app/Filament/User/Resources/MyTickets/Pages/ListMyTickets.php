<?php

namespace App\Filament\User\Resources\MyTickets\Pages;

use App\Filament\User\Resources\MyTickets\MyTicketResource;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Ticket;
use Filament\Schemas\Components\Tabs\Tab;

class ListMyTickets extends ListRecords
{
    protected static string $resource = MyTicketResource::class;

    protected function getHeaderActions(): array
    {
        return [];
    }

    public function getTabs(): array
    {
        $userId = auth()->id();

        return [
            'active' => Tab::make('Активные')
                ->modifyQueryUsing(fn(Builder $query) => $query->whereNotIn('status', ['resolved', 'closed', 'cancelled']))
                ->badge(Ticket::where('user_id', $userId)->whereNotIn('status', ['resolved', 'closed', 'cancelled'])->count()),
            'completed' => Tab::make('Завершённые')
                ->modifyQueryUsing(fn(Builder $query) => $query->whereIn('status', ['resolved', 'closed', 'cancelled']))
                ->badge(Ticket::where('user_id', $userId)->whereIn('status', ['resolved', 'closed', 'cancelled'])->count()),
        ];
    }
}
