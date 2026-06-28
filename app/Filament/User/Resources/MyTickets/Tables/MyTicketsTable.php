<?php
namespace App\Filament\User\Resources\MyTickets\Tables;

use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Actions\EditAction;

class MyTicketsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('ticket_number')
                    ->label(__('filament-panels::user-panel.my_tickets.table.ticket_number'))
                    ->searchable(),
                TextColumn::make('title')
                    ->label(__('filament-panels::user-panel.my_tickets.table.title'))
                    ->searchable(),
                TextColumn::make('category.name')
                    ->label(__('filament-panels::user-panel.my_tickets.table.category')),
                TextColumn::make('priority')
                    ->label(__('filament-panels::user-panel.my_tickets.table.priority'))
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'low'      => 'gray',
                        'medium'   => 'info',
                        'high'     => 'warning',
                        'critical' => 'danger',
                    })
                    ->formatStateUsing(fn(string $state): string => __("filament-panels::user-panel.priorities.{$state}")),
                TextColumn::make('status')
                    ->label(__('filament-panels::user-panel.my_tickets.table.status'))
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'new'         => 'gray',
                        'in_progress' => 'info',
                        'pending'     => 'warning',
                        'resolved'    => 'success',
                        'closed'      => 'success',
                        'cancelled'   => 'danger',
                    })
                    ->formatStateUsing(fn(string $state): string => __("filament-panels::user-panel.statuses.{$state}")),
                TextColumn::make('created_at')
                    ->label(__('filament-panels::user-panel.my_tickets.table.created_at'))
                    ->dateTime('d.m.Y H:i'),
            ])
            ->filters([])
            ->recordActions([
                ViewAction::make(),
                EditAction::make()
                    ->visible(fn($record) => ! in_array($record->status, ['closed', 'cancelled'])),
            ]);
    }
}
