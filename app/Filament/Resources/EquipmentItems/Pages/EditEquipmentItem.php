<?php

namespace App\Filament\Resources\EquipmentItems\Pages;

use App\Filament\Resources\EquipmentItems\EquipmentItemResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Resources\Pages\EditRecord;

class EditEquipmentItem extends EditRecord
{
    protected static string $resource = EquipmentItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
            ForceDeleteAction::make(),
            RestoreAction::make(),
        ];
    }
}
