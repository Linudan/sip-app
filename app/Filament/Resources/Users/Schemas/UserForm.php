<?php
namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
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
                Select::make('roles')
                    ->label(__('filament-panels::resources.roles.role_label'))
                    ->relationship('roles', 'name')
                    ->multiple(false)
                    ->preload()
                    ->searchable()
                    ->getOptionLabelFromRecordUsing(fn($record) => __("filament-panels::resources.roles.{$record->name}"))
                    ->visible(fn() => auth()->user()->hasRole('admin')),
                TextInput::make('email')
                    ->email()
                    ->required()
                    ->label(__('filament-panels::resources.users.columns.email'))
                    ->placeholder('user@example.com')
                    ->validationMessages([
                        'unique' => __('filament-panels::resources.users.validation.email_unique'),
                    ])
                    ->unique(
                        table: 'users',
                        column: 'email',
                        ignoreRecord: true,
                    ),
                TextInput::make('phone')
                    ->label(__('filament-panels::resources.users.columns.phone'))
                    ->placeholder('+7 (999) 999-99-99')
                    ->tel()
                    ->mask('+7 (999) 999-99-99')
                    ->regex('/^\+7 \(\d{3}\) \d{3}-\d{2}-\d{2}$/'),
                TextInput::make('internal_phone')
                    ->label(__('filament-panels::resources.users.columns.internal_phone'))
                    ->placeholder('4524')
                    ->mask('4599')
                    ->tel()
                    ->helperText('Введите последние две цифры') // уточните текст, если нужно
                    ->regex('/^45\d{2}$/'),                                             // дополнительная валидация (опционально)
                TextInput::make('telegram_username')
                    ->label(__('filament-panels::resources.users.columns.telegram_username'))
                    ->placeholder('@telegram'),
                TextInput::make('max_username')
                    ->label(__('filament-panels::resources.users.columns.max_username'))
                    ->placeholder('хеш')
                    ->helperText('В МАКС-е это не имя пользователя а хеш'),
                Select::make('department_id')
                    ->relationship('department', 'dep_name')
                    ->preload()
                    ->searchable()
                    ->label(__('filament-panels::resources.users.columns.department')),
                Select::make('position_id')
                    ->label(__('filament-panels::resources.users.columns.position'))
                    ->relationship('position', 'name')
                    ->preload()
                    ->searchable()
                    ->nullable(),
                DateTimePicker::make('email_verified_at')
                    ->label(__('filament-panels::resources.users.columns.email_verified_at')),
                TextInput::make('password')
                    ->password()
                    ->dehydrated(fn($state) => filled($state))
                    ->required(fn(string $context): bool => $context === 'create')
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
