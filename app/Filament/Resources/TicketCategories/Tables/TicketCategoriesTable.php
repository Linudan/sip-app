<?php
namespace App\Filament\Resources\TicketCategories\Tables;

use App\Exports\TicketCategoryExport;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use pxlrbt\FilamentExcel\Actions\ExportAction;
use pxlrbt\FilamentExcel\Actions\ExportBulkAction;

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
            ->headerActions([
                ExportAction::make()
                    ->label('Экспорт')
                    ->color('gray')
                    ->exports([
                        TicketCategoryExport::make()
                            ->fromTable()
                            ->except(['deleted_at', 'updated_at', 'slug'])
                            ->withFilename(fn() => 'Категории заявок_' . date('Y-m-d'))
                            ->askForWriterType(),
                    ]),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                    ExportBulkAction::make()
                        ->label('Экспорт выбранных')
                        ->color('gray')
                        ->exports([
                            TicketCategoryExport::make()
                            ->fromTable()
                            ->except(['deleted_at', 'updated_at', 'slug'])
                            ->withFilename(fn() => 'Категории заявок_' . date('Y-m-d'))
                            ->askForWriterType(),
                    ]),
                ]),
            ])
            // Сообщения при пустой таблице
            ->emptyStateHeading(__('filament-panels::resources.share.empty_table_heading'))
            ->emptyStateDescription(__('filament-panels::resources.share.empty_table_description'));
    }
}
