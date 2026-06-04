<?php

namespace App\Filament\Widgets;

use App\Models\EquipmentItem;
use Filament\Notifications\Notification;
use Filament\Widgets\Widget;

class QrScannerWidget extends Widget
{
    protected string $view = 'filament.widgets.qr-scanner-widget';

    public string $scanResult = '';

    public function processScan($data)
{
    $equipment = EquipmentItem::where('inventory_number', $data)->first();

    if ($equipment) {
        return redirect()->route('filament.admin.resources.equipment-items.view', $equipment);
    }

    Notification::make()
        ->title('Оборудование не найдено')
        ->body("По запросу \"{$data}\" ничего не найдено.")
        ->danger()
        ->send();
}
}
