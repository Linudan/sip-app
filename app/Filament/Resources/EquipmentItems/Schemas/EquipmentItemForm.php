<?php
namespace App\Filament\Resources\EquipmentItems\Schemas;

use App\Models\User;
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
                Select::make('status')
                    ->label(__('filament-panels::resources.equipments.columns.status'))
                    ->options([
                        'in_stock'    => __('filament-panels::resources.equipments.enums.status.in_stock'),
                        'in_use'      => __('filament-panels::resources.equipments.enums.status.in_use'),
                        'in_repair'   => __('filament-panels::resources.equipments.enums.status.in_repair'),
                        'written_off' => __('filament-panels::resources.equipments.enums.status.written_off'),
                    ])
                    ->default('in_stock')
                    ->required(),
                DatePicker::make('purchase_date')
                    ->label(__('filament-panels::resources.equipments.columns.purchase_date')),
                DatePicker::make('warranty_until')
                    ->label(__('filament-panels::resources.equipments.columns.warranty_until')),
                TextInput::make('purchase_price')
                    ->label(__('filament-panels::resources.equipments.columns.purchase_price'))
                    ->numeric()
                    ->prefix('₽'),
                Select::make('current_user_id')
                    ->label(__('filament-panels::resources.equipments.columns.current_user'))
                    ->searchable()
                    ->options(function () {
                        return User::all()
                            ->mapWithKeys(fn($user) => [$user->id => $user->full_name_with_initials])
                            ->toArray();
                    })
                    ->nullable()
                    ->live()
                    ->afterStateUpdated(function ($state, callable $set) {
                        if ($state) {
                            $user = User::find($state);
                            // Автоматически подставляем отдел пользователя, но не блокируем поле
                            $set('current_department_id', $user?->department_id);
                            $set('status', 'in_use');
                        } else {
                            // Если пользователь сброшен, отдел остаётся (можно сбросить вручную)
                            // $set('current_department_id', null);
                            $set('status', 'in_stock');
                        }
                    }),
                Select::make('current_department_id')
                    ->label(__('filament-panels::resources.equipments.columns.current_department'))
                    ->relationship('currentDepartment', 'dep_name')
                    ->nullable()
                    ->searchable()
                    ->preload(),
                Textarea::make('notes')
                    ->label(__('filament-panels::resources.equipments.columns.notes'))
                    ->columnSpanFull(),
                TextInput::make('qr_code_hash')
                    ->label(__('filament-panels::resources.equipments.columns.qr_code_hash')),
            ]);
    }
}
