<?php

namespace App\Filament\User\Resources\MyEquipment\Tables;

use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class MyEquipmentTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('category.name')
                    ->label('Категория')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('name')
                    ->label('Наименование')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('inventory_number')
                    ->label('Инвентарный номер'),
                TextColumn::make('serial_number')
                    ->label('Серийный номер'),
                TextColumn::make('manufacturer')
                    ->label('Производитель'),
                TextColumn::make('model')
                    ->label('Модель'),
                TextColumn::make('status')
                    ->label('Статус')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'in_use'      => 'success',
                        'in_stock'    => 'gray',
                        'in_repair'   => 'warning',
                        'written_off' => 'danger',
                    }),
                TextColumn::make('currentUser.full_name_with_initials')
                    ->label('Пользователь')
                    ->default('—'),
            ])
            ->filters([])
            ->recordActions([
                ViewAction::make(),
            ]);
    }
}
