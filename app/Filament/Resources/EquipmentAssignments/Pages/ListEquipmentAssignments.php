<?php

namespace App\Filament\Resources\EquipmentAssignments\Pages;

use App\Filament\Resources\EquipmentAssignments\EquipmentAssignmentResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListEquipmentAssignments extends ListRecords
{
    protected static string $resource = EquipmentAssignmentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
