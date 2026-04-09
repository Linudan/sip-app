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
                    ->required(),
                TextInput::make('surname'),
                TextInput::make('patronymic'),
                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->required(),
                TextInput::make('phone')
                    ->tel(),
                TextInput::make('telegram_username')
                    ->tel(),
                TextInput::make('max_username'),
                Select::make('department_id')
                    ->relationship('department', 'dep_name'),
                TextInput::make('position'),
                TextInput::make('profile_photo_path'),
                DateTimePicker::make('email_verified_at'),
                TextInput::make('password')
                    ->password()
                    ->dehydrated(fn ($state) => filled($state))
                    ->required(fn (string $context): bool => $context === 'create')
                    ->helperText('Оставьте пустым, чтобы не менять пароль (только при редактировании)'),
                Textarea::make('two_factor_secret')
                    ->columnSpanFull()
                    ->disabled(),
                Textarea::make('two_factor_recovery_codes')
                    ->columnSpanFull()
                    ->disabled(),
                DateTimePicker::make('two_factor_confirmed_at')
                    ->disabled(),
                DateTimePicker::make('last_login_at')
                    ->disabled(),
            ]);
    }
}
