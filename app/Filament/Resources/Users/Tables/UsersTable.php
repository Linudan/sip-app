<?php
namespace App\Filament\Resources\Users\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Enums\RecordActionsPosition;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;

class UsersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->striped()
            ->recordActionsPosition(RecordActionsPosition::BeforeCells)
            ->columns([
                TextColumn::make('deleted_at')
                    ->label(__('filament-panels::resources.users.columns.deleted_at'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('name')
                    ->label(__('filament-panels::resources.users.columns.name'))
                    ->placeholder(__('filament-panels::resources.users.placeholder.name'))
                    ->sortable()
                    ->searchable()
                    ->toggleable(),
                TextColumn::make('surname')
                    ->label(__('filament-panels::resources.users.columns.surname'))
                    ->placeholder(__('filament-panels::resources.users.placeholder.surname'))
                    ->sortable()
                    ->searchable()
                    ->toggleable(),
                TextColumn::make('patronymic')
                    ->label(__('filament-panels::resources.users.columns.patronymic'))
                    ->placeholder(__('filament-panels::resources.users.placeholder.patronymic'))
                    ->sortable()
                    ->searchable()
                    ->toggleable(),
                TextColumn::make('email')
                    ->label(__('filament-panels::resources.users.columns.email'))
                    ->placeholder(__('filament-panels::resources.users.placeholder.email'))
                    ->sortable()
                    ->searchable()
                    ->toggleable(),
                TextColumn::make('phone')
                    ->label(__('filament-panels::resources.users.columns.phone'))
                    ->placeholder(__('filament-panels::resources.users.placeholder.phone'))
                    ->color('primary')
                    ->url(fn($record) => "tel:{$record->phone}")
                    ->sortable()
                    ->searchable()
                    ->toggleable(),
                TextColumn::make('internal_phone')
                    ->label(__('filament-panels::resources.users.columns.internal_phone'))
                    ->placeholder(__('filament-panels::resources.users.placeholder.internal_phone'))
                    ->sortable()
                    ->searchable()
                    ->toggleable(),
                TextColumn::make('telegram_username')
                    ->label(__('filament-panels::resources.users.columns.telegram_username'))
                    ->placeholder(__('filament-panels::resources.users.placeholder.telegram_username'))
                    ->url(fn($record) => $record->telegram_username ? 'https://t.me/' . ltrim($record->telegram_username, '@') : null)
                    ->color('primary')
                    ->openUrlInNewTab()
                    ->sortable()
                    ->searchable()
                    ->toggleable(),
                TextColumn::make('max_username')
                    ->label(__('filament-panels::resources.users.columns.max_username'))
                    ->placeholder(__('filament-panels::resources.users.placeholder.max_username'))
                    ->url(fn($record) => $record->max_username ? 'https://max.ru/u/' . $record->max_username : null)
                    ->color('primary')
                    ->openUrlInNewTab()
                    ->sortable()
                    ->searchable()
                    ->toggleable(),
                TextColumn::make('department.dep_name')
                    ->label(__('filament-panels::resources.users.columns.department'))
                    ->placeholder(__('filament-panels::resources.users.placeholder.department'))
                    ->wrap()
                    ->sortable()
                    ->searchable()
                    ->toggleable(),
                TextColumn::make('position')
                    ->label(__('filament-panels::resources.users.columns.position'))
                    ->placeholder(__('filament-panels::resources.users.placeholder.position'))
                    ->sortable()
                    ->searchable()
                    ->toggleable(),
                TextColumn::make('avatar_url')
                    ->label(__('filament-panels::resources.users.columns.avatar_url'))
                    ->placeholder(__('filament-panels::resources.users.placeholder.avatar_url'))
                    ->sortable()
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('email_verified_at')
                    ->label(__('filament-panels::resources.users.columns.email_verified_at'))
                    ->placeholder(__('filament-panels::resources.users.placeholder.email_verified_at'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(),
                TextColumn::make('two_factor_confirmed_at')
                    ->label(__('filament-panels::resources.users.columns.two_factor_confirmed_at'))
                    ->placeholder(__('filament-panels::resources.users.placeholder.two_factor_confirmed_at'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('last_login_at')
                    ->label(__('filament-panels::resources.users.columns.last_login_at'))
                    ->placeholder(__('filament-panels::resources.users.placeholder.last_login_at'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(),
                TextColumn::make('created_at')
                    ->label(__('filament-panels::resources.users.columns.created_at'))
                    ->placeholder(__('filament-panels::resources.users.placeholder.created_at'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->label(__('filament-panels::resources.users.columns.updated_at'))
                    ->placeholder(__('filament-panels::resources.users.placeholder.updated_at'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                TrashedFilter::make(),
            ])
            ->recordActions([
                ViewAction::make(),
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
