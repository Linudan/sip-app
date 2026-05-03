<?php

namespace App\Filament\Widgets;

use App\Models\Ticket;
use Filament\Actions\Action;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class LatestTicketsWidget extends BaseWidget
{
    protected static ?int $sort = 2;
    protected int|string|array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Ticket::query()
                    ->latest('created_at')
                    ->limit(4)
            )
            ->paginated(false)
            ->columns([
                Tables\Columns\TextColumn::make('ticket_number')
                    ->label(__('filament-panels::resources.tikets.last_tikets_widget.ticket_number'))
                    ->sortable(),
                Tables\Columns\TextColumn::make('title')
                    ->label(__('filament-panels::resources.tikets.last_tikets_widget.title'))
                    ->limit(40),
                Tables\Columns\TextColumn::make('user.full_name_with_initials')
                    ->label(__('filament-panels::resources.tikets.last_tikets_widget.user_name')),
                Tables\Columns\TextColumn::make('status')
                    ->label(__('filament-panels::resources.tikets.last_tikets_widget.status'))
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'new'         => 'gray',
                        'in_progress' => 'info',
                        'pending'     => 'warning',
                        'resolved'    => 'success',
                        'closed'      => 'success',
                        'cancelled'   => 'danger',
                        default       => 'gray',
                    })
                    ->formatStateUsing(fn(string $state): string =>
                        __('filament-panels::resources.tikets.enums.status.' . $state)
                    ),
                Tables\Columns\TextColumn::make('created_at')
                    ->label(__('filament-panels::resources.tikets.last_tikets_widget.resolved_at'))
                    ->dateTime('d.m.Y H:i'),
            ])
            ->actions([
                Action::make('view')
                    ->label(__('filament-panels::resources.equipments.actions.open'))
                    ->url(fn(Ticket $record): string => route('filament.admin.resources.tickets.view', $record))
                    ->icon('heroicon-o-eye'),
            ])
            ->heading('Последние поступившие заявки')
            ->emptyStateHeading('Нет заявок');
    }
}
