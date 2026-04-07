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
                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->required(),
                DateTimePicker::make('email_verified_at'),
                TextInput::make('password')
                    ->password()
                    ->required(),
                TextInput::make('current_team_id')
                    ->numeric(),
                TextInput::make('profile_photo_path'),
                Textarea::make('two_factor_secret')
                    ->columnSpanFull(),
                Textarea::make('two_factor_recovery_codes')
                    ->columnSpanFull(),
                DateTimePicker::make('two_factor_confirmed_at'),
                TextInput::make('surname'),
                TextInput::make('patronymic'),
                Select::make('department_id')
                    ->relationship('department', 'id'),
                TextInput::make('position'),
                TextInput::make('phone')
                    ->tel(),
                TextInput::make('telegram_username')
                    ->tel(),
                TextInput::make('max_username'),
                TextInput::make('avatar_url')
                    ->url(),
                DateTimePicker::make('last_login_at'),
            ]);
    }
}
