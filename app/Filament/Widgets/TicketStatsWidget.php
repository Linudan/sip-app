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
            Stat::make('Всего заявок', $total)
                ->description('Общее количество')
                ->descriptionIcon('heroicon-m-document-text')
                ->color('primary'),
            Stat::make('Новые', $new)
                ->description('Ожидают обработки')
                ->descriptionIcon('heroicon-m-clock')
                ->color('warning'),
            Stat::make('В работе', $inProgress)
                ->description('Активные заявки')
                ->descriptionIcon('heroicon-m-cog-6-tooth')
                ->color('info'),
            Stat::make('Решённые', $resolved)
                ->description('Ожидают закрытия')
                ->descriptionIcon('heroicon-m-check-circle')
                ->color('success'),
            Stat::make('Закрытые', $closed)
                ->description('Завершённые')
                ->descriptionIcon('heroicon-m-archive-box')
                ->color('gray'),
        ];
    }
}
