<?php
namespace App\Filament\Resources\EquipmentItems\Pages;

use App\Filament\Resources\EquipmentItems\EquipmentItemResource;
use Filament\Actions;
use Filament\Infolists\Components\TextEntry;
use Filament\Resources\Pages\ViewRecord;
use Filament\Schemas\Schema;

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

    public function infolist(Schema $schema): Schema
    {
        return $schema
            ->schema([
                TextEntry::make('category.name')
                    ->label(__('filament-panels::resources.equipments.columns.category_name')),
                TextEntry::make('name')
                    ->label(__('filament-panels::resources.equipments.columns.name')),
                TextEntry::make('inventory_number')
                    ->label(__('filament-panels::resources.equipments.columns.inventory_number')),
                TextEntry::make('serial_number')
                    ->label(__('filament-panels::resources.equipments.columns.serial_number')),
                TextEntry::make('manufacturer')
                    ->label(__('filament-panels::resources.equipments.columns.manufacturer')),
                TextEntry::make('model')
                    ->label(__('filament-panels::resources.equipments.columns.model')),
                TextEntry::make('status')
                    ->label(__('filament-panels::resources.equipments.columns.status'))
                    ->formatStateUsing(fn(string $state): string =>
                        __('filament-panels::resources.equipments.enums.status.' . $state)
                    ),

                TextEntry::make('purchase_date')
                    ->label(__('filament-panels::resources.equipments.columns.purchase_date'))
                    ->date(),
                TextEntry::make('warranty_until')
                    ->label(__('filament-panels::resources.equipments.columns.warranty_until'))
                    ->date(),
                TextEntry::make('purchase_price')
                    ->label(__('filament-panels::resources.equipments.columns.purchase_price'))
                    ->money('RUB'),
                TextEntry::make('currentUser.full_name_with_initials')
                    ->label(__('filament-panels::resources.equipments.columns.current_user')),
                TextEntry::make('currentDepartment.dep_name')
                    ->label(__('filament-panels::resources.equipments.columns.current_department')),
                TextEntry::make('notes')
                    ->label(__('filament-panels::resources.equipments.columns.notes'))
                    ->columnSpanFull(),

                // QR-код
                TextEntry::make('qr_code_hash')
                    ->label(__('filament-panels::resources.equipments.columns.qr_code_hash'))
                    ->copyable(),
                TextEntry::make('qr_code_image')
                    ->label('QR-код')
                    ->html()
                    ->formatStateUsing(fn($record) =>
                        '<img src="' . $record->qr_code_image . '" alt="QR Code" style="max-width:150px;" />'
                    ),

                TextEntry::make('created_at')
                    ->label(__('filament-panels::resources.equipments.columns.created_at'))
                    ->dateTime(),
                TextEntry::make('updated_at')
                    ->label(__('filament-panels::resources.equipments.columns.updated_at'))
                    ->dateTime(),
            ]);
    }
}
