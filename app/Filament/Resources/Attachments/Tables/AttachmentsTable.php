<?php
namespace App\Filament\Resources\Attachments\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class AttachmentsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->striped()
            ->columns([
                TextColumn::make('attachable_type')
                    ->label(__('filament-panels::resources.attachments.columns.attachable_type'))
                    ->placeholder(__('filament-panels::resources.attachments.placeholder.attachable_type'))
                    ->toggleable()
                    ->searchable(),
                TextColumn::make('attachable_id')
                    ->label(__('filament-panels::resources.attachments.columns.attachable_id'))
                    ->placeholder(__('filament-panels::resources.attachments.placeholder.attachable_id'))
                    ->numeric()
                    ->toggleable()
                    ->sortable(),
                TextColumn::make('file_path')
                    ->label(__('filament-panels::resources.attachments.columns.file_path'))
                    ->placeholder(__('filament-panels::resources.attachments.placeholder.file_path'))
                    ->toggleable()
                    ->searchable(),
                TextColumn::make('original_name')
                    ->label(__('filament-panels::resources.attachments.columns.original_name'))
                    ->placeholder(__('filament-panels::resources.attachments.placeholder.original_name'))
                    ->toggleable()
                    ->searchable(),
                TextColumn::make('mime_type')
                    ->label(__('filament-panels::resources.attachments.columns.mime_type'))
                    ->placeholder(__('filament-panels::resources.attachments.placeholder.mime_type'))
                    ->toggleable()
                    ->searchable(),
                TextColumn::make('size')
                    ->label(__('filament-panels::resources.attachments.columns.size'))
                    ->placeholder(__('filament-panels::resources.attachments.placeholder.size'))
                    ->numeric()
                    ->toggleable()
                    ->sortable(),
                TextColumn::make('uploaded_by')
                    ->label(__('filament-panels::resources.attachments.columns.uploaded_by'))
                    ->placeholder(__('filament-panels::resources.attachments.placeholder.uploaded_by'))
                    ->numeric()
                    ->toggleable()
                    ->sortable(),
                TextColumn::make('created_at')
                    ->label(__('filament-panels::resources.attachments.columns.created_at'))
                    ->placeholder(__('filament-panels::resources.attachments.placeholder.created_at'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->label(__('filament-panels::resources.attachments.columns.updated_at'))
                    ->placeholder(__('filament-panels::resources.attachments.placeholder.updated_at'))
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
