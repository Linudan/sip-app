<?php

namespace App\Filament\User\Widgets;

use App\Models\Ticket;
use Filament\Actions\Action;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Support\Facades\Auth;

class UserLatestTicketsWidget extends BaseWidget
{
    protected static ?int $sort = 2;
    protected int|string|array $columnSpan = 'full';

    // Добавляем кнопку в заголовок виджета
    protected function getHeaderActions(): array
    {
        return [
            Action::make('create')
                ->label(__('filament-panels::user-panel.my_tickets.actions.create'))
                ->url(route('filament.user.resources.my-tickets.create'))
                ->icon('heroicon-o-plus')
                ->color('primary'),
        ];
    }


    public function table(Table $table): Table
    {
        return $table
            ->query(
                Ticket::query()
                    ->where('user_id', Auth::id())
                    ->whereNotIn('status', ['resolved', 'closed', 'cancelled'])
                    ->latest('created_at')
                    ->limit(5)
            )
            ->paginated(false)
            ->columns([
                TextColumn::make('ticket_number')
                    ->label(__('filament-panels::user-panel.widgets.latest_tickets.columns.ticket_number'))
                    ->searchable(),
                TextColumn::make('title')
                    ->label(__('filament-panels::user-panel.widgets.latest_tickets.columns.title'))
                    ->limit(40),
                TextColumn::make('priority')
                    ->label(__('filament-panels::user-panel.widgets.latest_tickets.columns.priority'))
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'low'      => 'gray',
                        'medium'   => 'info',
                        'high'     => 'warning',
                        'critical' => 'danger',
                    })
                    ->formatStateUsing(fn(string $state): string => __('filament-panels::user-panel.priorities.' . $state)),
                TextColumn::make('status')
                    ->label(__('filament-panels::user-panel.widgets.latest_tickets.columns.status'))
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'new'         => 'gray',
                        'in_progress' => 'info',
                        'pending'     => 'warning',
                        default       => 'gray',
                    })
                    ->formatStateUsing(fn(string $state): string => __('filament-panels::user-panel.statuses.' . $state)),
                TextColumn::make('created_at')
                    ->label(__('filament-panels::user-panel.widgets.latest_tickets.columns.created_at'))
                    ->dateTime('d.m.Y H:i'),
            ])
            ->actions([
                Action::make('view')
                    ->label('Открыть')
                    ->url(fn(Ticket $record): string => route('filament.user.resources.my-tickets.view', $record))
                    ->icon('heroicon-o-eye')
                    ->openUrlInNewTab(false),
            ])
            ->heading(__('filament-panels::user-panel.widgets.latest_tickets.title'))
            ->emptyStateHeading(__('filament-panels::user-panel.widgets.latest_tickets.empty_message'));
    }
}
