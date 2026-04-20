<?php
namespace App\Filament\Resources\EquipmentCategories\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class EquipmentCategoriesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->striped()
            ->columns([
                TextColumn::make('name')
                    ->label(__('filament-panels::resources.equipment-сategories.columns.name'))
                    ->placeholder(__('filament-panels::resources.equipment-сategories.placeholder.name'))
                    ->searchable()
                    ->sortable()
                    ->toggleable(),
                TextColumn::make('slug')
                    ->label(__('filament-panels::resources.equipment-сategories.columns.slug'))
                    ->placeholder(__('filament-panels::resources.equipment-сategories.placeholder.slug'))
                    ->searchable()
                    ->sortable()
                    ->toggleable(),
                TextColumn::make('parent.name')
                    ->label(__('filament-panels::resources.equipment-сategories.columns.parent_name'))
                    ->placeholder(__('filament-panels::resources.equipment-сategories.placeholder.parent_name'))
                    ->searchable()
                    ->sortable()
                    ->toggleable(),
                TextColumn::make('icon')
                    ->label(__('filament-panels::resources.equipment-сategories.columns.icon'))
                    ->placeholder(__('filament-panels::resources.equipment-сategories.placeholder.icon'))
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('created_at')
                    ->label(__('filament-panels::resources.equipment-сategories.columns.created_at'))
                    ->placeholder(__('filament-panels::resources.equipment-сategories.placeholder.created_at'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->label(__('filament-panels::resources.equipment-сategories.columns.updated_at'))
                    ->placeholder(__('filament-panels::resources.equipment-сategories.placeholder.updated_at'))
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
