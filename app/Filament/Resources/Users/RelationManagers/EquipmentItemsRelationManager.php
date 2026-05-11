<?php

namespace App\Filament\Resources\UserResource\RelationManagers;

use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class EquipmentItemsRelationManager extends RelationManager
{
    protected static string $relationship = 'equipmentItems';

    protected static ?string $recordTitleAttribute = 'name';

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('category.name')
                    ->label(__('filament-panels::resources.equipments.columns.category_name'))
                    ->sortable()
                    ->searchable(),
                TextColumn::make('name')
                    ->label(__('filament-panels::resources.equipments.columns.name'))
                    ->sortable()
                    ->searchable(),
                TextColumn::make('inventory_number')
                    ->label(__('filament-panels::resources.equipments.columns.inventory_number'))
                    ->searchable(),
                TextColumn::make('serial_number')
                    ->label(__('filament-panels::resources.equipments.columns.serial_number'))
                    ->searchable(),
                TextColumn::make('manufacturer')
                    ->label(__('filament-panels::resources.equipments.columns.manufacturer'))
                    ->sortable(),
                TextColumn::make('model')
                    ->label(__('filament-panels::resources.equipments.columns.model'))
                    ->sortable(),
                TextColumn::make('status')
                    ->label(__('filament-panels::resources.equipments.columns.status'))
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'in_use'      => 'success',
                        'in_stock'    => 'gray',
                        'in_repair'   => 'warning',
                        'written_off' => 'danger',
                    })
                    ->formatStateUsing(fn(string $state): string =>
                        __('filament-panels::resources.equipments.enums.status.' . $state)
                    ),
            ])
            ->actions([
                ViewAction::make()
                    ->url(fn ($record) => route('filament.admin.resources.equipment-items.view', $record)),
            ]);
    }
}
