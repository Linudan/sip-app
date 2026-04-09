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
                    ->placeholder('Name')
                    ->sortable()
                    ->searchable()
                    ->toggleable(),
                TextColumn::make('surname')
                    ->placeholder('Surname')
                    ->sortable()
                    ->searchable()
                    ->toggleable(),
                TextColumn::make('patronymic')
                    ->placeholder('Patronymic')
                    ->sortable()
                    ->searchable()
                    ->toggleable(),
                TextColumn::make('email')
                    ->label('Email address')
                    ->placeholder('Email')
                    ->sortable()
                    ->searchable()
                    ->toggleable(),
                TextColumn::make('phone')
                    ->placeholder('Phone')
                    ->sortable()
                    ->searchable()
                    ->toggleable(),
                TextColumn::make('telegram_username')
                    ->placeholder('@telegram_username')
                    ->sortable()
                    ->searchable()
                    ->toggleable(),
                TextColumn::make('max_username')
                    ->placeholder('@max_username')
                    ->sortable()
                    ->searchable()
                    ->toggleable(),
                TextColumn::make('department.dep_name')
                    ->placeholder('Department name')
                    ->sortable()
                    ->searchable()
                    ->toggleable(),
                TextColumn::make('position')
                    ->placeholder('Position')
                    ->sortable()
                    ->searchable()
                    ->toggleable(),
                TextColumn::make('profile_photo_path')
                    ->placeholder('Profile photo path')
                    ->sortable()
                    ->searchable()
                    ->toggleable(),
                TextColumn::make('email_verified_at')
                    ->placeholder('Email verified at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(),
                TextColumn::make('two_factor_confirmed_at')
                    ->placeholder('Two factor confirmed at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(),
                TextColumn::make('last_login_at')
                    ->placeholder('Last login at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(),
                TextColumn::make('created_at')
                    ->placeholder('Created at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
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
            ]);
    }
}
