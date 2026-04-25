<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required()
                    ->label(__('filament-panels::resources.users.columns.name')),
                TextInput::make('surname')
                    ->label(__('filament-panels::resources.users.columns.surname')),
                TextInput::make('patronymic')
                    ->label(__('filament-panels::resources.users.columns.patronymic')),
                TextInput::make('email')
                    ->email()
                    ->required()
                    ->label(__('filament-panels::resources.users.columns.email'))
                    ->placeholder('user@example.com'),
                TextInput::make('phone')
                    ->tel()
                    ->label(__('filament-panels::resources.users.columns.phone'))
                    ->placeholder('+7 (999) 999-99-99')
                    ->mask('+7 (999) 999-99-99'),
                TextInput::make('telegram_username')
                    ->label(__('filament-panels::resources.users.columns.telegram_username'))
                    ->placeholder('@telegram'),
                TextInput::make('max_username')
                    ->label(__('filament-panels::resources.users.columns.max_username'))
                    ->placeholder('@max_username'),
                Select::make('department_id')
                    ->relationship('department', 'dep_name')
                    ->preload()
                    ->searchable()
                    ->label(__('filament-panels::resources.users.columns.department')),
                TextInput::make('position')
                    ->label(__('filament-panels::resources.users.columns.position')),
                TextInput::make('avatar_url')
                    ->label(__('filament-panels::resources.users.columns.avatar_url'))
                    ->helperText('Не меняйте если хотите использовать простой аватар'),
                DateTimePicker::make('email_verified_at')
                    ->label(__('filament-panels::resources.users.columns.email_verified_at')),
                TextInput::make('password')
                    ->password()
                    ->dehydrated(fn ($state) => filled($state))
                    ->required(fn (string $context): bool => $context === 'create')
                    ->label(__('filament-panels::resources.users.columns.password'))
                    ->helperText('Оставьте пустым, чтобы не менять пароль (только при редактировании)'),
                Textarea::make('two_factor_secret')
                    ->columnSpanFull()
                    ->disabled()
                    ->label(__('filament-panels::resources.users.columns.two_factor_secret')),
                Textarea::make('two_factor_recovery_codes')
                    ->columnSpanFull()
                    ->disabled()
                    ->label(__('filament-panels::resources.users.columns.two_factor_recovery_codes')),
                DateTimePicker::make('two_factor_confirmed_at')
                    ->disabled()
                    ->label(__('filament-panels::resources.users.columns.two_factor_confirmed_at')),
                DateTimePicker::make('last_login_at')
                    ->disabled()
                    ->label(__('filament-panels::resources.users.columns.last_login_at')),
            ]);
    }
}
