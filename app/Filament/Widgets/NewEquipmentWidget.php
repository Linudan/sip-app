<?php

namespace App\Filament\Widgets;

use App\Models\EquipmentItem;
use Filament\Actions\Action;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class NewEquipmentWidget extends BaseWidget
{
    protected static ?int $sort = 4;
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
                    ->label(__('filament-panels::resources.equipments.new_eq_widget.name'))
                    ->sortable(),
                Tables\Columns\TextColumn::make('inventory_number')
                    ->label(__('filament-panels::resources.equipments.new_eq_widget.inventory_number'))
                    ->sortable(),
                Tables\Columns\TextColumn::make('status')
                    ->label(__('filament-panels::resources.equipments.new_eq_widget.status'))
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
                    ->label(__('filament-panels::resources.equipments.new_eq_widget.purchase_date'))
                    ->dateTime('d.m.Y H:i'),
            ])
            ->actions([
                Action::make('view')
                    ->label(__('filament-panels::resources.equipments.actions.open'))
                    ->url(fn(EquipmentItem $record): string => route('filament.admin.resources.equipment-items.view', $record))
                    ->icon('heroicon-o-eye'),
            ])
            ->heading(__('filament-panels::resources.equipments.new_eq_widget.table_name'))
            ->emptyStateHeading(__('filament-panels::resources.equipments.new_eq_widget.empty'));
    }
}
