<?php

namespace App\Filament\Widgets;

use App\Models\Ticket;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class TicketStatsWidget extends BaseWidget
{
    protected static ?int $sort = 1;
    protected int|string|array $columnSpan = 'full';
    protected int|null|array $columns = 5;

    protected function getStats(): array
    {
        $total = Ticket::count();
        $new = Ticket::where('status', 'new')->count();
        $inProgress = Ticket::where('status', 'in_progress')->count();
        $resolved = Ticket::where('status', 'resolved')->count();
        $closed = Ticket::where('status', 'closed')->count();

        return [
            Stat::make(__('filament-panels::resources.tikets.stat_widget.total'), $total)
                ->description(__('filament-panels::resources.tikets.stat_widget.total_desc'))
                ->descriptionIcon('heroicon-m-document-text')
                ->color('primary'),
            Stat::make(__('filament-panels::resources.tikets.stat_widget.new'), $new)
                ->description(__('filament-panels::resources.tikets.stat_widget.new_desc'))
                ->descriptionIcon('heroicon-m-clock')
                ->color('warning'),
            Stat::make(__('filament-panels::resources.tikets.stat_widget.in_progress'), $inProgress)
                ->description(__('filament-panels::resources.tikets.stat_widget.in_progress_desc'))
                ->descriptionIcon('heroicon-m-cog-6-tooth')
                ->color('info'),
            Stat::make(__('filament-panels::resources.tikets.stat_widget.resolved'), $resolved)
                ->description(__('filament-panels::resources.tikets.stat_widget.resolved_desc'))
                ->descriptionIcon('heroicon-m-check-circle')
                ->color('success'),
            Stat::make(__('filament-panels::resources.tikets.stat_widget.closed'), $closed)
                ->description(__('filament-panels::resources.tikets.stat_widget.closed_desc'))
                ->descriptionIcon('heroicon-m-archive-box')
                ->color('gray'),
        ];
    }
}
