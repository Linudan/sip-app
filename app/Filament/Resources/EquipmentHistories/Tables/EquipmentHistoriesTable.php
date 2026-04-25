<?php
namespace App\Filament\Resources\EquipmentHistories\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class EquipmentHistoriesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->striped()
            ->columns([
                TextColumn::make('user.full_name_with_initials')
                    ->label(__('filament-panels::resources.equipment-histories.columns.user_name'))
                    ->placeholder(__('filament-panels::resources.equipment-histories.placeholder.user_name'))
                    ->sortable(query: function ($query, $direction) {
                        return $query->join('users', 'equipment_histories.user_id', '=', 'users.id')
                            ->orderBy('users.surname', $direction)
                            ->orderBy('users.name', $direction);
                    })
                    ->toggleable()
                    ->searchable(),
                TextColumn::make('equipmentItem.name')
                    ->label(__('filament-panels::resources.equipment-histories.columns.equipment_item_name'))
                    ->placeholder(__('filament-panels::resources.equipment-histories.placeholder.equipment_item_name'))
                    ->toggleable()
                    ->searchable(),
                TextColumn::make('action')
                    ->label(__('filament-panels::resources.equipment-histories.columns.action'))
                    ->placeholder(__('filament-panels::resources.equipment-histories.placeholder.action'))
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'assigned'       => 'success',
                        'returned'       => 'warning',
                        'repaired'       => 'info',
                        'status_changed' => 'primary',
                        'created'        => 'gray',
                        'updated'        => 'gray',
                    })
                    ->formatStateUsing(fn(string $state): string =>
                        __('filament-panels::resources.equipment-histories.enums.action.' . $state)
                    )
                    ->toggleable()
                    ->searchable(),
                TextColumn::make('created_at')
                    ->label(__('filament-panels::resources.equipment-histories.columns.created_at'))
                    ->placeholder(__('filament-panels::resources.departequipment-historiesments.placeholder.created_at'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->label(__('filament-panels::resources.equipment-histories.columns.created_at'))
                    ->placeholder(__('filament-panels::resources.departequipment-historiesments.placeholder.created_at'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            // Сообщения при пустой таблице
            ->emptyStateHeading(__('filament-panels::resources.share.empty_table_heading'))
            ->emptyStateDescription(__('filament-panels::resources.share.empty_table_description'));
    }
}
