<?php
namespace App\Filament\Resources\EquipmentItems\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class EquipmentItemForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('category_id')
                    ->label(__('filament-panels::resources.equipments.columns.category_name'))
                    ->relationship('category', 'name')
                    ->required(),
                TextInput::make('name')
                    ->label(__('filament-panels::resources.equipments.columns.name'))
                    ->required(),
                TextInput::make('inventory_number')
                    ->label(__('filament-panels::resources.equipments.columns.inventory_number')),
                TextInput::make('serial_number')
                    ->label(__('filament-panels::resources.equipments.columns.serial_number')),
                TextInput::make('manufacturer')
                    ->label(__('filament-panels::resources.equipments.columns.manufacturer')),
                TextInput::make('model')
                    ->label(__('filament-panels::resources.equipments.columns.model')),
                Textarea::make('specifications')
                    ->label(__('filament-panels::resources.equipments.columns.specifications'))
                    ->columnSpanFull(),
                TextInput::make('status')
                    ->label(__('filament-panels::resources.equipments.columns.status'))
                    ->required()
                    ->default('in_stock'),
                DatePicker::make('purchase_date')
                    ->label(__('filament-panels::resources.equipments.columns.purchase_date')),
                DatePicker::make('warranty_until')
                    ->label(__('filament-panels::resources.equipments.columns.warranty_until')),
                TextInput::make('purchase_price')
                    ->label(__('filament-panels::resources.equipments.columns.purchase_price'))
                    ->numeric()
                    ->prefix('₽'),
                Select::make('current_user_id')
                    ->label(__('filament-panels::resources.equipments.columns.user_name'))
                    ->relationship('currentUser', 'name'),
                Select::make('department_id')
                    ->label(__('filament-panels::resources.equipments.columns.department_id'))
                    ->relationship('department', 'id'),
                Textarea::make('notes')
                    ->label(__('filament-panels::resources.equipments.columns.notes'))
                    ->columnSpanFull(),
                TextInput::make('qr_code_hash')
                    ->label(__('filament-panels::resources.equipments.columns.qr_code_hash')),
            ]);
    }
}
