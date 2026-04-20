<?php
namespace App\Filament\Resources\Departments\Pages;

use App\Filament\Resources\EquipmentHistories\EquipmentHistoryResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewEquipmentHistories extends ViewRecord
{
    protected static string $resource = EquipmentHistoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
