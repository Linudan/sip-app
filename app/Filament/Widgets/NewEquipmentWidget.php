<?php

namespace App\Filament\Widgets;

use App\Models\EquipmentItem;
use Filament\Actions\Action;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class NewEquipmentWidget extends BaseWidget
{
    protected static ?int $sort = 3;
    protected int|string|array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->query(
                EquipmentItem::query()
                    ->latest('created_at')
                    ->limit(4)
            )
            ->paginated(false)
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Наименование')
                    ->sortable(),
                Tables\Columns\TextColumn::make('inventory_number')
                    ->label('Инв. номер')
                    ->sortable(),
                Tables\Columns\TextColumn::make('status')
                    ->label('Статус')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'in_stock'    => 'gray',
                        'in_use'      => 'success',
                        'in_repair'   => 'warning',
                        'written_off' => 'danger',
                    })
                    ->formatStateUsing(fn(string $state): string =>
                        __('filament-panels::resources.equipments.enums.status.' . $state)
                    ),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Добавлено')
                    ->dateTime('d.m.Y H:i'),
            ])
            ->actions([
                Action::make('view')
                    ->label('Открыть')
                    ->url(fn(EquipmentItem $record): string => route('filament.admin.resources.equipment-items.view', $record))
                    ->icon('heroicon-o-eye'),
            ])
            ->heading('Новое оборудование')
            ->emptyStateHeading('Нет оборудования');
    }
}
