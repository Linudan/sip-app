<?php
namespace App\Filament\Resources\EquipmentAssignments\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class EquipmentAssignmentsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('equipmentItem.name')
                    ->label(__('filament-panels::resources.equipment-assignments.columns.equipment_item_name'))
                    ->placeholder(__('filament-panels::resources.equipment-assignments.placeholder.equipment_item_name'))
                    ->toggleable()
                    ->sortable()
                    ->searchable(),
                TextColumn::make('user.name')
                    ->label(__('filament-panels::resources.equipment-assignments.columns.user_name'))
                    ->placeholder(__('filament-panels::resources.equipment-assignments.placeholder.user_name'))
                    ->toggleable()
                    ->sortable()
                    ->searchable(),
                TextColumn::make('assigned_by')
                    ->label(__('filament-panels::resources.equipment-assignments.columns.assigned_by'))
                    ->placeholder(__('filament-panels::resources.equipment-assignments.placeholder.assigned_by'))
                    ->toggleable()
                    ->numeric()
                    ->sortable(),
                TextColumn::make('assigned_at')
                    ->label(__('filament-panels::resources.equipment-assignments.columns.assigned_at'))
                    ->placeholder(__('filament-panels::resources.equipment-assignments.placeholder.assigned_at'))
                    ->dateTime()
                    ->toggleable()
                    ->sortable(),
                TextColumn::make('returned_at')
                    ->label(__('filament-panels::resources.equipment-assignments.columns.returned_at'))
                    ->placeholder(__('filament-panels::resources.equipment-assignments.placeholder.returned_at'))
                    ->toggleable()
                    ->dateTime()
                    ->sortable(),
                IconColumn::make('is_current')
                    ->label(__('filament-panels::resources.equipment-assignments.columns.is_current'))
                    ->placeholder(__('filament-panels::resources.equipment-assignments.placeholder.is_current'))
                    ->toggleable()
                    ->sortable()
                    ->boolean(),
                TextColumn::make('created_at')
                    ->label(__('filament-panels::resources.equipment-assignments.columns.created_at'))
                    ->placeholder(__('filament-panels::resources.equipment-assignments.placeholder.created_at'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->label(__('filament-panels::resources.equipment-assignments.columns.updated_at'))
                    ->placeholder(__('filament-panels::resources.equipment-assignments.placeholder.updated_at'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
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
