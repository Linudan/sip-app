<?php

namespace App\Filament\Resources\EquipmentHistories\Pages;

use App\Filament\Resources\EquipmentHistories\EquipmentHistoryResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListEquipmentHistories extends ListRecords
{
    protected static string $resource = EquipmentHistoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
