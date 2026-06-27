<?php
namespace App\Filament\Resources\TicketCategories\RelationManagers;

use Filament\Actions\ViewAction;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class TicketsRelationManager extends RelationManager
{
    protected static string $relationship = 'tickets';
    protected static ?string $recordTitleAttribute = 'ticket_number';

    public function table(Table $table): Table
    {
        return $table
            ->heading(__('filament-panels::resources.ticket-categories.tickets.label'))
            ->emptyStateHeading(__('filament-panels::resources.ticket-categories.tickets.empty'))
            ->columns([
                TextColumn::make('ticket_number')
                    ->label(__('filament-panels::resources.tikets.columns.ticket_number'))
                    ->searchable()
                    ->sortable(),
                TextColumn::make('user.full_name_with_initials')
                    ->label(__('filament-panels::resources.tikets.columns.user_name'))
                    ->searchable(),
                TextColumn::make('title')
                    ->label(__('filament-panels::resources.tikets.columns.title'))
                    ->limit(40),
                TextColumn::make('priority')
                    ->label(__('filament-panels::resources.tikets.columns.priority'))
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'low'      => 'gray',
                        'medium'   => 'info',
                        'high'     => 'warning',
                        'critical' => 'danger',
                    })
                    ->formatStateUsing(fn(string $state): string =>
                        __('filament-panels::resources.tikets.enums.priority.' . $state)
                    ),
                TextColumn::make('status')
                    ->label(__('filament-panels::resources.tikets.columns.status'))
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'new'         => 'gray',
                        'in_progress' => 'info',
                        'pending'     => 'warning',
                        'resolved'    => 'success',
                        'closed'      => 'success',
                        'cancelled'   => 'danger',
                    })
                    ->formatStateUsing(fn(string $state): string =>
                        __('filament-panels::resources.tikets.enums.status.' . $state)
                    ),
                TextColumn::make('created_at')
                    ->label(__('filament-panels::resources.tikets.columns.created_at'))
                    ->dateTime('d.m.Y H:i'),
            ])
            ->actions([
                ViewAction::make()
                    ->url(fn($record) => route('filament.admin.resources.tickets.view', $record))
                    ->modal(false)
                    ->openUrlInNewTab(false),
            ]);
    }
}
