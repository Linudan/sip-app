<?php
namespace App\Filament\Resources\EquipmentHistories\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class EquipmentHistoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('user_id')
                    ->label(__('filament-panels::resources.equipment-histories.columns.user_name'))
                    ->options(function () {
                        return \App\Models\User::all()
                            ->mapWithKeys(fn($user) => [$user->id => $user->full_name_with_initials])
                            ->toArray();
                    })
                    ->searchable()
                    ->nullable(),
                Select::make('equipment_item_id')
                    ->label(__('filament-panels::resources.equipment-histories.columns.equipment_item_name'))
                    ->relationship('equipmentItem', 'name')
                    ->required(),
                Select::make('action')
                    ->label(__('filament-panels::resources.equipment-histories.columns.action'))
                    ->options([
                        'assigned'       => __('filament-panels::resources.equipment-histories.enums.action.assigned'),
                        'returned'       => __('filament-panels::resources.equipment-histories.enums.action.returned'),
                        'repaired'       => __('filament-panels::resources.equipment-histories.enums.action.repaired'),
                        'status_changed' => __('filament-panels::resources.equipment-histories.enums.action.status_changed'),
                        'created'        => __('filament-panels::resources.equipment-histories.enums.action.created'),
                        'updated'        => __('filament-panels::resources.equipment-histories.enums.action.updated'),
                    ])
                    ->required(),
                Textarea::make('details')
                    ->label(__('filament-panels::resources.equipment-histories.columns.details'))
                    ->columnSpanFull(),
            ]);
    }
}
