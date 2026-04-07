<?php

namespace App\Filament\Resources\EquipmentItems\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class EquipmentItemForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('category_id')
                    ->relationship('category', 'name')
                    ->required(),
                TextInput::make('name')
                    ->required(),
                TextInput::make('inventory_number'),
                TextInput::make('serial_number'),
                TextInput::make('manufacturer'),
                TextInput::make('model'),
                Textarea::make('specifications')
                    ->columnSpanFull(),
                TextInput::make('status')
                    ->required()
                    ->default('in_stock'),
                DatePicker::make('purchase_date'),
                DatePicker::make('warranty_until'),
                TextInput::make('purchase_price')
                    ->numeric()
                    ->prefix('$'),
                Select::make('current_user_id')
                    ->relationship('currentUser', 'name'),
                Select::make('department_id')
                    ->relationship('department', 'id'),
                Textarea::make('notes')
                    ->columnSpanFull(),
                TextInput::make('qr_code_hash'),
            ]);
    }
}
