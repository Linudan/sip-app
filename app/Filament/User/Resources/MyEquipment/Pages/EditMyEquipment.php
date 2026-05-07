<?php

namespace App\Filament\User\Resources\MyEquipment\Pages;

use App\Filament\User\Resources\MyEquipment\MyEquipmentResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditMyEquipment extends EditRecord
{
    protected static string $resource = MyEquipmentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
