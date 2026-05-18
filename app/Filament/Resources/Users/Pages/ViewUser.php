<?php
namespace App\Filament\Resources\Users\Pages;

use App\Filament\Resources\Users\UserResource;
use Filament\Actions;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Resources\Pages\ViewRecord;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ViewUser extends ViewRecord
{
    protected static string $resource = UserResource::class;


    // Конфигурация названия страницы
    public function getTitle(): string
    {
        $record   = $this->getRecord();
        $fullName = trim($record->name . ' ' . $record->surname);
        // Можно также добавить patronymic, если нужно
        // $fullName = trim("{$record->name} {$record->surname} {$record->patronymic}");

        return "Просмотр: {$fullName}";
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
            Actions\DeleteAction::make(),
        ];
    }

    public function infolist(Schema $schema): Schema
    {
        return $schema
            ->schema([
                // Карточка 1: Личная информация
                Section::make(__('filament-panels::resources.users.view_cards.personal_information'))
                    ->icon('heroicon-o-user')
                    ->columns(2)
                    ->schema([
                        TextEntry::make('name')
                            ->label(__('filament-panels::resources.users.columns.name'))
                            ->placeholder('—'),
                        TextEntry::make('surname')
                            ->label(__('filament-panels::resources.users.columns.surname'))
                            ->placeholder('—'),
                        TextEntry::make('patronymic')
                            ->label(__('filament-panels::resources.users.columns.patronymic'))
                            ->placeholder('—'),
                        TextEntry::make('position.name')
                            ->label(__('filament-panels::resources.users.columns.position'))
                            ->placeholder('—'),
                        // Аватар – как изображение, если есть URL
                        ImageEntry::make('avatar_url')
                            ->label(__('filament-panels::resources.users.columns.avatar_url'))
                            ->circular()
                            ->size(64)
                            ->placeholder('—')
                            ->visible(fn($record) => filled($record->avatar_url)),
                        TextEntry::make('avatar_url')
                            ->label(__('filament-panels::resources.users.columns.avatar_url'))
                            ->badge()
                            ->color('gray')
                            ->visible(fn($record) => blank($record->avatar_url))
                            ->placeholder('—'),
                    ]),

                // Карточка 2: Контакты и соцсети
                Section::make(__('filament-panels::resources.users.view_cards.contacts'))
                    ->icon('heroicon-o-envelope')
                    ->columns(2)
                    ->schema([
                        TextEntry::make('email')
                            ->label(__('filament-panels::resources.users.columns.email'))
                            ->icon('heroicon-o-envelope')
                            ->url(fn($record) => "mailto:{$record->email}")
                            ->placeholder('—'),
                        TextEntry::make('phone')
                            ->label(__('filament-panels::resources.users.columns.phone'))
                            ->icon('heroicon-o-phone')
                            ->url(fn($record) => "tel:{$record->phone}")
                            ->color('primary')
                            ->placeholder('—'),
                        TextEntry::make('internal_phone')
                            ->label(__('filament-panels::resources.users.columns.internal_phone'))
                            ->icon('heroicon-o-device-phone-mobile')
                            ->placeholder('—'),
                        TextEntry::make('telegram_username')
                            ->label(__('filament-panels::resources.users.columns.telegram_username'))
                            ->icon('heroicon-o-chat-bubble-left-right')
                            ->url(fn($record) => "https://t.me/" . ltrim($record->telegram_username, '@'))
                            ->openUrlInNewTab()
                            ->color('primary')
                            ->placeholder('—'),
                        TextEntry::make('max_username')
                            ->label(__('filament-panels::resources.users.columns.max_username'))
                            ->icon('heroicon-o-user-group')
                            ->url(fn($record) => "https://max.ru/u/" . ltrim($record->max_username, '@')) // добавляем ссылку
                            ->openUrlInNewTab()
                            ->color('primary')
                            ->helperText('В МАКС-е это не имя пользователя а хеш')
                            ->placeholder('—'),
                    ]),

                // Карточка 3: Отдел (связь)
                Section::make(__('filament-panels::resources.users.view_cards.department'))
                    ->icon('heroicon-o-building-office')
                    ->schema([
                        TextEntry::make('department.dep_name')
                            ->label(__('filament-panels::resources.users.columns.department'))
                            ->badge()
                            ->color('success')
                            ->placeholder('—'),
                    ]),

                // Карточка 4: Безопасность и 2FA
                Section::make(__('filament-panels::resources.users.view_cards.security'))
                    ->icon('heroicon-o-shield-check')
                    ->collapsible()
                    ->collapsed(true)
                    ->columns(2)
                    ->schema([
                        TextEntry::make('email_verified_at')
                            ->label(__('filament-panels::resources.users.columns.email_verified_at'))
                            ->dateTime('d.m.Y H:i')
                            ->placeholder('—'),
                        TextEntry::make('two_factor_confirmed_at')
                            ->label(__('filament-panels::resources.users.columns.two_factor_confirmed_at'))
                            ->dateTime('d.m.Y H:i')
                            ->placeholder('—'),
                        TextEntry::make('two_factor_secret')
                            ->label(__('filament-panels::resources.users.columns.two_factor_secret'))
                            ->limit(20)
                            ->tooltip(fn($state) => $state)
                            ->placeholder('—'),
                        TextEntry::make('two_factor_recovery_codes')
                            ->label(__('filament-panels::resources.users.columns.two_factor_recovery_codes'))
                            ->listWithLineBreaks()
                            ->bulleted()
                            ->placeholder('—'),
                    ]),

                // Карточка 5: Активность
                Section::make(__('filament-panels::resources.users.view_cards.activity'))
                    ->icon('heroicon-o-clock')
                    ->columns(2)
                    ->schema([
                        TextEntry::make('last_login_at')
                            ->label(__('filament-panels::resources.users.columns.last_login_at'))
                            ->dateTime('d.m.Y H:i')
                            ->placeholder('—'),
                        TextEntry::make('created_at')
                            ->label(__('filament-panels::resources.users.columns.created_at'))
                            ->dateTime('d.m.Y H:i'),
                        TextEntry::make('updated_at')
                            ->label(__('filament-panels::resources.users.columns.updated_at'))
                            ->dateTime('d.m.Y H:i'),
                    ]),
            ]);
    }
}
