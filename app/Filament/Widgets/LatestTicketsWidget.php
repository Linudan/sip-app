<?php

namespace App\Filament\Widgets;

use App\Models\Ticket;
use Filament\Actions\Action;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class LatestTicketsWidget extends BaseWidget
{
    protected static ?int $sort = 1;
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
                    ->label('№ заявки')
                    ->sortable(),
                Tables\Columns\TextColumn::make('title')
                    ->label('Тема')
                    ->limit(40),
                Tables\Columns\TextColumn::make('user.full_name_with_initials')
                    ->label('Пользователь'),
                Tables\Columns\TextColumn::make('status')
                    ->label('Статус')
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
                    ->label('Создана')
                    ->dateTime('d.m.Y H:i'),
            ])
            ->actions([
                Action::make('view')
                    ->label('Открыть')
                    ->url(fn(Ticket $record): string => route('filament.admin.resources.tickets.view', $record))
                    ->icon('heroicon-o-eye'),
            ])
            ->heading('Последние поступившие заявки')
            ->emptyStateHeading('Нет заявок');
    }
}
