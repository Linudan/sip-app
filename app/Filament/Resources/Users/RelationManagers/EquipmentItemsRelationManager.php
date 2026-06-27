<?php
namespace App\Filament\Resources\Users\RelationManagers;

use Filament\Actions\ViewAction;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;

class EquipmentItemsRelationManager extends RelationManager
{
    protected static string $relationship = 'equipmentItems';

    protected static ?string $recordTitleAttribute = 'name';

    public static function getTitle(Model $ownerRecord, string $pageClass): string
    {
        return __('filament-panels::resources.users.equipment.label');
    }

    public function table(Table $table): Table
    {
        return $table
            ->heading(__('filament-panels::resources.users.equipment.label'))
            ->emptyStateHeading(__('filament-panels::resources.users.equipment.empty'))
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
                    ->url(fn($record) => route('filament.admin.resources.equipment-items.view', $record)),
            ]);
    }
}
