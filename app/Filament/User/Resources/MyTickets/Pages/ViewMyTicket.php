<?php

namespace App\Filament\User\Resources\MyTickets\Pages;

use App\Filament\User\Resources\MyTickets\MyTicketResource;
use Filament\Resources\Pages\ViewRecord;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ViewMyTicket extends ViewRecord
{
    protected static string $resource = MyTicketResource::class;

    protected function getHeaderActions(): array
    {
        return [];
    }

    public function infolist(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Section::make(__('filament-panels::user-panel.my_tickets.view.ticket_info'))
                    ->columns(2)
                    ->schema([
                        TextEntry::make('ticket_number')
                            ->label(__('filament-panels::user-panel.my_tickets.table.ticket_number'))
                            ->placeholder('—'),
                        TextEntry::make('title')
                            ->label(__('filament-panels::user-panel.my_tickets.table.title'))
                            ->placeholder('—'),
                        TextEntry::make('category.name')
                            ->label(__('filament-panels::user-panel.my_tickets.table.category'))
                            ->placeholder('—'),
                        TextEntry::make('priority')
                            ->label(__('filament-panels::user-panel.my_tickets.table.priority'))
                            ->badge()
                            ->formatStateUsing(fn(string $state): string => __("filament-panels::user-panel.priorities.{$state}"))
                            ->color(fn(string $state): string => match ($state) {
                                'low'      => 'gray',
                                'medium'   => 'info',
                                'high'     => 'warning',
                                'critical' => 'danger',
                            }),
                        TextEntry::make('status')
                            ->label(__('filament-panels::user-panel.my_tickets.table.status'))
                            ->badge()
                            ->formatStateUsing(fn(string $state): string => __("filament-panels::user-panel.statuses.{$state}"))
                            ->color(fn(string $state): string => match ($state) {
                                'new'         => 'gray',
                                'in_progress' => 'info',
                                'pending'     => 'warning',
                                'resolved'    => 'success',
                                'closed'      => 'success',
                                'cancelled'   => 'danger',
                            }),
                        TextEntry::make('created_at')
                            ->label(__('filament-panels::user-panel.my_tickets.view.created_at'))
                            ->dateTime('d.m.Y H:i')
                            ->placeholder('—'),
                        TextEntry::make('resolved_at')
                            ->label(__('filament-panels::user-panel.my_tickets.view.resolved_at'))
                            ->dateTime('d.m.Y H:i')
                            ->placeholder('—'),
                        TextEntry::make('closed_at')
                            ->label(__('filament-panels::user-panel.my_tickets.view.closed_at'))
                            ->dateTime('d.m.Y H:i')
                            ->placeholder('—'),
                    ]),
                Section::make(__('filament-panels::user-panel.my_tickets.view.description'))
                    ->schema([
                        TextEntry::make('description')
                            ->label('')
                            ->markdown()
                            ->placeholder('—'),
                    ]),
                Section::make(__('filament-panels::user-panel.my_tickets.view.equipment'))
                    ->schema([
                        TextEntry::make('equipmentItem.name')
                            ->label(__('filament-panels::user-panel.my_tickets.form.equipment_item_id'))
                            ->placeholder('Не указано'),
                    ]),
                Section::make(__('filament-panels::user-panel.my_tickets.view.feedback'))
                    ->columns(2)
                    ->schema([
                        TextEntry::make('user_rating')
                            ->label(__('filament-panels::user-panel.my_tickets.view.rating'))
                            ->formatStateUsing(fn($state) => $state ? str_repeat('★', $state) . str_repeat('☆', 5 - $state) : '—'),
                        TextEntry::make('user_feedback')
                            ->label(__('filament-panels::user-panel.my_tickets.view.review'))
                            ->markdown()
                            ->placeholder('—'),
                    ]),
            ]);
    }
}
