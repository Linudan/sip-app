<?php

namespace App\Filament\User\Resources\MyEquipment\Pages;

use App\Filament\User\Resources\MyEquipment\MyEquipmentResource;
use Filament\Resources\Pages\ViewRecord;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ViewMyEquipment extends ViewRecord
{
    protected static string $resource = MyEquipmentResource::class;

    protected function getHeaderActions(): array
    {
        return [];
    }

    public function infolist(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Section::make(__('filament-panels::user-panel.my_equipment.view.basic_info'))
                    ->columns(2)
                    ->schema([
                        TextEntry::make('category.name')
                            ->label(__('filament-panels::user-panel.my_equipment.table.category'))
                            ->placeholder('—'),
                        TextEntry::make('name')
                            ->label(__('filament-panels::user-panel.my_equipment.table.name'))
                            ->placeholder('—'),
                        TextEntry::make('inventory_number')
                            ->label(__('filament-panels::user-panel.my_equipment.table.inventory_number'))
                            ->placeholder('—'),
                        TextEntry::make('serial_number')
                            ->label(__('filament-panels::user-panel.my_equipment.table.serial_number'))
                            ->placeholder('—'),
                        TextEntry::make('manufacturer')
                            ->label(__('filament-panels::user-panel.my_equipment.table.manufacturer'))
                            ->placeholder('—'),
                        TextEntry::make('model')
                            ->label(__('filament-panels::user-panel.my_equipment.table.model'))
                            ->placeholder('—'),
                        TextEntry::make('status')
                            ->label(__('filament-panels::user-panel.my_equipment.table.status'))
                            ->badge()
                            ->formatStateUsing(fn(string $state): string => __("filament-panels::user-panel.statuses.{$state}"))
                            ->color(fn(string $state): string => match ($state) {
                                'in_use'      => 'success',
                                'in_stock'    => 'gray',
                                'in_repair'   => 'warning',
                                'written_off' => 'danger',
                            }),
                    ]),
                Section::make(__('filament-panels::user-panel.my_equipment.view.location'))
                    ->columns(2)
                    ->schema([
                        TextEntry::make('currentUser.full_name_with_initials')
                            ->label(__('filament-panels::user-panel.my_equipment.view.current_user'))
                            ->placeholder('—'),
                        TextEntry::make('currentDepartment.dep_name')
                            ->label(__('filament-panels::user-panel.my_equipment.view.department'))
                            ->placeholder('—'),
                    ]),
                Section::make(__('filament-panels::user-panel.my_equipment.view.additional'))
                    ->schema([
                        TextEntry::make('notes')
                            ->label(__('filament-panels::user-panel.my_equipment.view.notes'))
                            ->markdown()
                            ->placeholder('—'),
                    ]),
            ]);
    }
}
