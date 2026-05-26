<?php
namespace App\Filament\User\Resources\MyEquipment\Pages;

use App\Filament\User\Resources\MyEquipment\MyEquipmentResource;
use App\Models\EquipmentItem;
use Filament\Resources\Pages\ListRecords;
use Filament\Schemas\Components\Tabs\Tab;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class ListMyEquipment extends ListRecords
{
    protected static string $resource = MyEquipmentResource::class;

    protected function getHeaderActions(): array
    {
        return [];
    }

    public function getTabs(): array
    {
        $userId       = Auth::id();
        $departmentId = Auth::user()->department_id;
        $tabs         = [];

        // Вкладка "Моё оборудование" всегда есть
        $tabs['my'] = Tab::make(__('filament-panels::user-panel.my_equipment.tabs.my'))
            ->modifyQueryUsing(fn(Builder $query) => $query->where('current_user_id', $userId))
            ->badge(EquipmentItem::where('current_user_id', $userId)->count());

        // Вкладка "Оборудование отдела" – только если пользователь в отделе
        if ($departmentId) {
            $tabs['department'] = Tab::make(__('filament-panels::user-panel.my_equipment.tabs.department'))
                ->modifyQueryUsing(fn(Builder $query) => $query
                        ->where('current_department_id', $departmentId)
                        ->whereNull('current_user_id')
                )
                ->badge(EquipmentItem::where('current_department_id', $departmentId)->whereNull('current_user_id')->count());
        }

        return $tabs;
    }
}
