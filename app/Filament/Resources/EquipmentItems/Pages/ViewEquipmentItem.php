<?php
namespace App\Filament\Resources\Departments\Pages;

use App\Filament\Resources\EquipmentItems\EquipmentItemResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewEquipmentItem extends ViewRecord
{
    protected static string $resource = EquipmentItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
