<?php

namespace App\Filament\Widgets;

use App\Models\EquipmentItem;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class EquipmentStatsWidget extends BaseWidget
{
    protected static ?int $sort = 3;
    protected int|string|array $columnSpan = 'full';
    protected int|null|array $columns = 5;

    protected function getStats(): array
    {
        $total = EquipmentItem::count();
        $inStock = EquipmentItem::where('status', 'in_stock')->count();
        $inUse = EquipmentItem::where('status', 'in_use')->count();
        $inRepair = EquipmentItem::where('status', 'in_repair')->count();
        $writtenOff = EquipmentItem::where('status', 'written_off')->count();

        return [
            Stat::make('Всего оборудования', $total)
                ->description('Единиц техники')
                ->descriptionIcon('heroicon-m-computer-desktop')
                ->color('primary'),
            Stat::make('В наличии', $inStock)
                ->description('Свободное')
                ->descriptionIcon('heroicon-m-check-circle')
                ->color('success'),
            Stat::make('В использовании', $inUse)
                ->description('Выдано пользователям')
                ->descriptionIcon('heroicon-m-user')
                ->color('info'),
            Stat::make('В ремонте', $inRepair)
                ->description('Требует внимания')
                ->descriptionIcon('heroicon-m-wrench')
                ->color('warning'),
            Stat::make('Списано', $writtenOff)
                ->description('Выведено из эксплуатации')
                ->descriptionIcon('heroicon-m-trash')
                ->color('danger'),
        ];
    }
}
