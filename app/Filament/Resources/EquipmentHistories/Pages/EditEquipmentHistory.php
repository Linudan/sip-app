<?php

namespace App\Filament\Resources\EquipmentHistories\Pages;

use App\Filament\Resources\EquipmentHistories\EquipmentHistoryResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditEquipmentHistory extends EditRecord
{
    protected static string $resource = EquipmentHistoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
