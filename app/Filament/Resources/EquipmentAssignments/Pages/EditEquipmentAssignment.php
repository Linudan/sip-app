<?php

namespace App\Filament\Resources\EquipmentAssignments\Pages;

use App\Filament\Resources\EquipmentAssignments\EquipmentAssignmentResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditEquipmentAssignment extends EditRecord
{
    protected static string $resource = EquipmentAssignmentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
