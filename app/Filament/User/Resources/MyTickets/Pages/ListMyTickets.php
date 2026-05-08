<?php

namespace App\Filament\User\Resources\MyTickets\Pages;

use App\Filament\User\Resources\MyTickets\MyTicketResource;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Ticket;
use Filament\Actions\CreateAction;
use Filament\Schemas\Components\Tabs\Tab;

class ListMyTickets extends ListRecords
{
    protected static string $resource = MyTicketResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->label(__('filament-panels::user-panel.my_tickets.actions.create'))
                ->icon('heroicon-o-plus'),
        ];
    }

    public function getTabs(): array
    {
        $userId = auth()->id();

        return [
            'active' => Tab::make(__('filament-panels::user-panel.my_tickets.tabs.active'))
                ->modifyQueryUsing(fn(Builder $query) => $query->whereNotIn('status', ['resolved', 'closed', 'cancelled']))
                ->badge(Ticket::where('user_id', $userId)->whereNotIn('status', ['resolved', 'closed', 'cancelled'])->count()),
            'completed' => Tab::make(__('filament-panels::user-panel.my_tickets.tabs.completed'))
                ->modifyQueryUsing(fn(Builder $query) => $query->whereIn('status', ['resolved', 'closed', 'cancelled']))
                ->badge(Ticket::where('user_id', $userId)->whereIn('status', ['resolved', 'closed', 'cancelled'])->count()),
        ];
    }
}
