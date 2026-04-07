<?php

namespace App\Filament\Resources\EquipmentHistories\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class EquipmentHistoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('user_id')
                    ->relationship('user', 'name'),
                Select::make('equipment_item_id')
                    ->relationship('equipmentItem', 'name')
                    ->required(),
                TextInput::make('action')
                    ->required(),
                Textarea::make('details')
                    ->columnSpanFull(),
            ]);
    }
}
