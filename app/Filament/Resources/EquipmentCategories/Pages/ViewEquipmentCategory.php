<?php
namespace App\Filament\Resources\Departments\Pages;

use App\Filament\Resources\EquipmentCategories\EquipmentCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewEquipmentCategory extends ViewRecord
{
    protected static string $resource = EquipmentCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
