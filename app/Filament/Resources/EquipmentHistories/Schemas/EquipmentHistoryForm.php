<?php
namespace App\Filament\Resources\EquipmentHistories\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class EquipmentHistoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('user_id')
                    ->label(__('filament-panels::resources.equipment-histories.columns.user_name'))
                    ->relationship('user', 'name'),
                Select::make('equipment_item_id')
                    ->label(__('filament-panels::resources.equipment-histories.columns.equipment_item_name'))
                    ->relationship('equipmentItem', 'name')
                    ->required(),
                TextInput::make('action')
                    ->label(__('filament-panels::resources.equipment-histories.columns.action'))
                    ->required(),
                Textarea::make('details')
                    ->label(__('filament-panels::resources.equipment-histories.columns.details'))
                    ->columnSpanFull(),
            ]);
    }
}
