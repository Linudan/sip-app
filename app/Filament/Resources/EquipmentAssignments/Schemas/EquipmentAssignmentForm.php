<?php
namespace App\Filament\Resources\EquipmentAssignments\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class EquipmentAssignmentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('equipment_item_id')
                    ->label(__('filament-panels::resources.equipment-assignments.columns.equipment_item_name'))
                    ->relationship('equipmentItem', 'name')
                    ->required(),
                Select::make('user_id')
                    ->label(__('filament-panels::resources.equipment-assignments.columns.user_name'))
                    ->relationship('user', 'name')
                    ->required(),
                TextInput::make('assigned_by')
                    ->label(__('filament-panels::resources.equipment-assignments.columns.assigned_by'))
                    ->numeric(),
                DateTimePicker::make('assigned_at')
                    ->label(__('filament-panels::resources.equipment-assignments.columns.assigned_at'))
                    ->required(),
                DateTimePicker::make('returned_at')
                    ->label(__('filament-panels::resources.equipment-assignments.columns.returned_at')),
                Textarea::make('return_reason')
                    ->label(__('filament-panels::resources.equipment-assignments.columns.return_reason'))
                    ->columnSpanFull(),
                Toggle::make('is_current')
                    ->label(__('filament-panels::resources.equipment-assignments.columns.is_current'))
                    ->required(),
            ]);
    }
}
