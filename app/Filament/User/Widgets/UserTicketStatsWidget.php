<?php

namespace App\Filament\User\Widgets;

use App\Models\Ticket;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Facades\Auth;

class UserTicketStatsWidget extends BaseWidget
{
    protected static ?int $sort = 1;
    protected int|string|array $columnSpan = 'full';
    protected int|null|array $columns = 4;

    protected function getStats(): array
    {
        $userId = Auth::id();

        $total = Ticket::where('user_id', $userId)->count();
        $active = Ticket::where('user_id', $userId)
            ->whereNotIn('status', ['resolved', 'closed', 'cancelled'])
            ->count();
        $resolved = Ticket::where('user_id', $userId)
            ->where('status', 'resolved')
            ->count();
        $closed = Ticket::where('user_id', $userId)
            ->where('status', 'closed')
            ->count();

        return [
            Stat::make(__('filament-panels::user-panel.widgets.ticket_stats.total'), $total)
                ->color('primary')
                ->descriptionIcon('heroicon-m-document-text'),
            Stat::make(__('filament-panels::user-panel.widgets.ticket_stats.active'), $active)
                ->color('warning')
                ->descriptionIcon('heroicon-m-clock'),
            Stat::make(__('filament-panels::user-panel.widgets.ticket_stats.resolved'), $resolved)
                ->color('success')
                ->descriptionIcon('heroicon-m-check-circle'),
            Stat::make(__('filament-panels::user-panel.widgets.ticket_stats.closed'), $closed)
                ->color('gray')
                ->descriptionIcon('heroicon-m-archive-box'),
        ];
    }
}
