<?php

namespace App\Filament\Resources\EquipmentCategories\RelationManagers;

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
                TextColumn::make('name')
                    ->label(__('filament-panels::resources.equipments.columns.name'))
                    ->searchable()
                    ->sortable(),
                TextColumn::make('inventory_number')
                    ->label(__('filament-panels::resources.equipments.columns.inventory_number'))
                    ->searchable(),
                TextColumn::make('serial_number')
                    ->label(__('filament-panels::resources.equipments.columns.serial_number'))
                    ->searchable(),
                TextColumn::make('manufacturer')
                    ->label(__('filament-panels::resources.equipments.columns.manufacturer')),
                TextColumn::make('model')
                    ->label(__('filament-panels::resources.equipments.columns.model')),
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
                TextColumn::make('currentUser.full_name_with_initials')
                    ->label(__('filament-panels::resources.equipments.columns.current_user'))
                    ->placeholder(__('filament-panels::resources.equipments.placeholder.current_user')),
            ])
            ->actions([
                ViewAction::make()
                    ->url(fn ($record) => route('filament.admin.resources.equipment-items.view', $record)),
            ]);
    }
}
