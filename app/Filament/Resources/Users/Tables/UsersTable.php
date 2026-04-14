<?php
namespace App\Filament\Resources\Users\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class UsersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->striped()
            ->columns([
                TextColumn::make('name')
                    ->label(__('filament-panels::resources.users.columns.name'))
                    ->placeholder('Name')
                    ->sortable()
                    ->searchable()
                    ->toggleable(),
                TextColumn::make('surname')
                    ->label(__('filament-panels::resources.users.columns.surname'))
                    ->placeholder('Surname')
                    ->sortable()
                    ->searchable()
                    ->toggleable(),
                TextColumn::make('patronymic')
                    ->label(__('filament-panels::resources.users.columns.patronymic'))
                    ->placeholder('Patronymic')
                    ->sortable()
                    ->searchable()
                    ->toggleable(),
                TextColumn::make('email')
                    ->label(__('filament-panels::resources.users.columns.email'))
                    ->placeholder('Email')
                    ->sortable()
                    ->searchable()
                    ->toggleable(),
                TextColumn::make('phone')
                    ->label(__('filament-panels::resources.users.columns.phone'))
                    ->placeholder('Phone')
                    ->sortable()
                    ->searchable()
                    ->toggleable(),
                TextColumn::make('telegram_username')
                    ->label(__('filament-panels::resources.users.columns.telegram_username'))
                    ->placeholder('@telegram_username')
                    ->sortable()
                    ->searchable()
                    ->toggleable(),
                TextColumn::make('max_username')
                    ->label(__('filament-panels::resources.users.columns.max_username'))
                    ->placeholder('@max_username')
                    ->sortable()
                    ->searchable()
                    ->toggleable(),
                TextColumn::make('department.dep_name')
                    ->label(__('filament-panels::resources.users.columns.department'))
                    ->placeholder('Department name')
                    ->sortable()
                    ->searchable()
                    ->toggleable(),
                TextColumn::make('position')
                    ->label(__('filament-panels::resources.users.columns.position'))
                    ->placeholder('Position')
                    ->sortable()
                    ->searchable()
                    ->toggleable(),
                TextColumn::make('profile_photo_path')
                    ->label(__('filament-panels::resources.users.columns.profile_photo_path'))
                    ->placeholder('Profile photo path')
                    ->sortable()
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('email_verified_at')
                    ->label(__('filament-panels::resources.users.columns.email_verified_at'))
                    ->placeholder('Email verified at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(),
                TextColumn::make('two_factor_confirmed_at')
                    ->label(__('filament-panels::resources.users.columns.two_factor_confirmed_at'))
                    ->placeholder('Two factor confirmed at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('last_login_at')
                    ->label(__('filament-panels::resources.users.columns.last_login_at'))
                    ->placeholder('Last login at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(),
                TextColumn::make('created_at')
                    ->label(__('filament-panels::resources.users.columns.created_at'))
                    ->placeholder('Created at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->label(__('filament-panels::resources.users.columns.updated_at'))
                    ->placeholder('Updated at')
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
