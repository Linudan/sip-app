<?php
namespace App\Filament\Widgets;

use App\Models\EquipmentItem;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class EquipmentStatsWidget extends BaseWidget
{
    protected static ?int $sort                = 3;
    protected int|string|array $columnSpan = 'full';
    protected int|null|array $columns      = 5;

    protected function getStats(): array
    {
        $total      = EquipmentItem::count();
        $inStock    = EquipmentItem::where('status', 'in_stock')->count();
        $inUse      = EquipmentItem::where('status', 'in_use')->count();
        $inRepair   = EquipmentItem::where('status', 'in_repair')->count();
        $writtenOff = EquipmentItem::where('status', 'written_off')->count();

        return [
            Stat::make(__('filament-panels::resources.equipments.stat_widget.total'), $total)
                ->description(__('filament-panels::resources.equipments.stat_widget.total_desc'))
                ->descriptionIcon('heroicon-m-computer-desktop')
                ->color('primary'),
            Stat::make(__('filament-panels::resources.equipments.stat_widget.in_stock'), $inStock)
                ->description(__('filament-panels::resources.equipments.stat_widget.in_stock_desc'))
                ->descriptionIcon('heroicon-m-check-circle')
                ->color('success'),
            Stat::make(__('filament-panels::resources.equipments.stat_widget.in_use'), $inUse)
                ->description(__('filament-panels::resources.equipments.stat_widget.in_use_desc'))
                ->descriptionIcon('heroicon-m-user')
                ->color('info'),
            Stat::make(__('filament-panels::resources.equipments.stat_widget.in_repair'), $inRepair)
                ->description(__('filament-panels::resources.equipments.stat_widget.in_repair_desc'))
                ->descriptionIcon('heroicon-m-wrench')
                ->color('warning'),
            Stat::make(__('filament-panels::resources.equipments.stat_widget.written_off'), $writtenOff)
                ->description(__('filament-panels::resources.equipments.stat_widget.written_off_desc'))
                ->descriptionIcon('heroicon-m-trash')
                ->color('danger'),
        ];
    }
}
