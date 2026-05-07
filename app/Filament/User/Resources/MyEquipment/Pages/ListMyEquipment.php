<?php

namespace App\Filament\User\Resources\MyEquipment\Pages;

use App\Filament\User\Resources\MyEquipment\MyEquipmentResource;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use App\Models\EquipmentItem;
use Filament\Schemas\Components\Tabs\Tab;

class ListMyEquipment extends ListRecords
{
    protected static string $resource = MyEquipmentResource::class;

    // Убираем кнопку "Создать"
    protected function getHeaderActions(): array
    {
        return [];
    }

    public function getTabs(): array
    {
        $userId = Auth::id();
        $departmentId = Auth::user()->department_id;

        return [
            'my' => Tab::make('Моё оборудование')
                ->modifyQueryUsing(fn(Builder $query) => $query->where('current_user_id', $userId))
                ->badge(EquipmentItem::where('current_user_id', $userId)->count()),
            'department' => Tab::make('Оборудование отдела')
                ->modifyQueryUsing(fn(Builder $query) => $query
                    ->where('current_department_id', $departmentId)
                    ->whereNull('current_user_id')
                )
                ->badge(EquipmentItem::where('current_department_id', $departmentId)->whereNull('current_user_id')->count()),
        ];
    }
}
