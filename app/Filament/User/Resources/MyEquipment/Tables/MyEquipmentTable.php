<?php

namespace App\Filament\User\Resources\MyEquipment\Tables;

use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class MyEquipmentTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('category.name')
                    ->label(__('filament-panels::user-panel.my_equipment.table.category'))
                    ->sortable()
                    ->searchable(),
                TextColumn::make('name')
                    ->label(__('filament-panels::user-panel.my_equipment.table.name'))
                    ->searchable()
                    ->sortable(),
                TextColumn::make('inventory_number')
                    ->label(__('filament-panels::user-panel.my_equipment.table.inventory_number')),
                TextColumn::make('serial_number')
                    ->label(__('filament-panels::user-panel.my_equipment.table.serial_number')),
                TextColumn::make('manufacturer')
                    ->label(__('filament-panels::user-panel.my_equipment.table.manufacturer')),
                TextColumn::make('model')
                    ->label(__('filament-panels::user-panel.my_equipment.table.model')),
                TextColumn::make('status')
                    ->label(__('filament-panels::user-panel.my_equipment.table.status'))
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'in_use'      => 'success',
                        'in_stock'    => 'gray',
                        'in_repair'   => 'warning',
                        'written_off' => 'danger',
                    })
                    ->formatStateUsing(fn(string $state): string => __("filament-panels::user-panel.statuses.{$state}")),
                TextColumn::make('currentUser.full_name_with_initials')
                    ->label(__('filament-panels::user-panel.my_equipment.table.user'))
                    ->default('—'),
            ])
            ->filters([])
            ->recordActions([
                ViewAction::make(),
            ]);
    }
}
