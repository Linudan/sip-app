<?php
namespace App\Filament\Resources\EquipmentItems\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;

class EquipmentItemsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('deleted_at')
                    ->label(__('filament-panels::resources.equipments.columns.deleted_at'))
                    ->placeholder(__('filament-panels::resources.equipments.placeholder.deleted_at'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('category.name')
                    ->label(__('filament-panels::resources.equipments.columns.category_name'))
                    ->placeholder(__('filament-panels::resources.equipments.placeholder.category_name'))
                    ->searchable()
                    ->sortable()
                    ->toggleable(),
                TextColumn::make('name')
                    ->label(__('filament-panels::resources.equipments.columns.name'))
                    ->placeholder(__('filament-panels::resources.equipments.placeholder.name'))
                    ->searchable()
                    ->sortable()
                    ->toggleable(),
                TextColumn::make('inventory_number')
                    ->label(__('filament-panels::resources.equipments.columns.inventory_number'))
                    ->placeholder(__('filament-panels::resources.equipments.placeholder.inventory_number'))
                    ->toggleable()
                    ->searchable(),
                TextColumn::make('serial_number')
                    ->label(__('filament-panels::resources.equipments.columns.serial_number'))
                    ->placeholder(__('filament-panels::resources.equipments.placeholder.serial_number'))
                    ->toggleable()
                    ->searchable(),
                TextColumn::make('manufacturer')
                    ->label(__('filament-panels::resources.equipments.columns.manufacturer'))
                    ->placeholder(__('filament-panels::resources.equipments.placeholder.manufacturer'))
                    ->sortable()
                    ->toggleable()
                    ->searchable(),
                TextColumn::make('model')
                    ->label(__('filament-panels::resources.equipments.columns.model'))
                    ->placeholder(__('filament-panels::resources.equipments.placeholder.model'))
                    ->sortable()
                    ->toggleable()
                    ->searchable(),
                TextColumn::make('status')
                    ->label(__('filament-panels::resources.equipments.columns.status'))
                    ->placeholder(__('filament-panels::resources.equipments.placeholder.status'))
                    ->sortable()
                    ->toggleable()
                    ->searchable(),
                TextColumn::make('purchase_date')
                    ->label(__('filament-panels::resources.equipments.columns.purchase_date'))
                    ->placeholder(__('filament-panels::resources.equipments.placeholder.purchase_date'))
                    ->date()
                    ->sortable()
                    ->toggleable()
                    ->searchable(),
                TextColumn::make('warranty_until')
                    ->label(__('filament-panels::resources.equipments.columns.warranty_until'))
                    ->placeholder(__('filament-panels::resources.equipments.placeholder.warranty_until'))
                    ->date()
                    ->sortable()
                    ->toggleable()
                    ->searchable(),
                TextColumn::make('purchase_price')
                    ->label(__('filament-panels::resources.equipments.columns.purchase_price'))
                    ->placeholder(__('filament-panels::resources.equipments.placeholder.purchase_price'))
                    ->money()
                    ->sortable()
                    ->toggleable()
                    ->searchable(),
                TextColumn::make('currentUser.name')
                    ->label(__('filament-panels::resources.equipments.columns.user_name'))
                    ->placeholder(__('filament-panels::resources.equipments.placeholder.user_name'))
                    ->sortable()
                    ->toggleable()
                    ->searchable(),
                TextColumn::make('department.dep_name')
                    ->label(__('filament-panels::resources.equipments.columns.department_id'))
                    ->placeholder(__('filament-panels::resources.equipments.placeholder.department_id'))
                    ->sortable()
                    ->toggleable()
                    ->searchable(),
                TextColumn::make('qr_code_hash')
                    ->label(__('filament-panels::resources.equipments.columns.qr_code_hash'))
                    ->placeholder(__('filament-panels::resources.equipments.placeholder.qr_code_hash'))
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('created_at')
                    ->label(__('filament-panels::resources.equipments.columns.created_at'))
                    ->placeholder(__('filament-panels::resources.equipments.placeholder.created_at'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->label(__('filament-panels::resources.equipments.columns.updated_at'))
                    ->placeholder(__('filament-panels::resources.equipments.placeholder.updated_at'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                TrashedFilter::make(),
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                    ForceDeleteBulkAction::make(),
                    RestoreBulkAction::make(),
                ]),
            ])
            // Сообщения при пустой таблице
            ->emptyStateHeading(__('filament-panels::resources.share.empty_table_heading'))
            ->emptyStateDescription(__('filament-panels::resources.share.empty_table_description'));
    }
}
