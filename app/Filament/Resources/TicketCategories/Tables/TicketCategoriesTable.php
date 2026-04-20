<?php
namespace App\Filament\Resources\TicketCategories\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class TicketCategoriesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->striped()
            ->columns([
                TextColumn::make('name')
                    ->label(__('filament-panels::resources.ticket-categories.columns.name'))
                    ->placeholder(__('filament-panels::resources.ticket-categories.placeholder.name'))
                    ->sortable()
                    ->toggleable()
                    ->searchable(),
                TextColumn::make('slug')
                    ->label(__('filament-panels::resources.ticket-categories.columns.slug'))
                    ->placeholder(__('filament-panels::resources.ticket-categories.placeholder.slug'))
                    ->toggleable()
                    ->searchable(),
                TextColumn::make('created_at')
                    ->label(__('filament-panels::resources.ticket-categories.columns.created_at'))
                    ->placeholder(__('filament-panels::resources.ticket-categories.placeholder.created_at'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->label(__('filament-panels::resources.ticket-categories.columns.updated_at'))
                    ->placeholder(__('filament-panels::resources.ticket-categories.placeholder.updated_at'))
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
