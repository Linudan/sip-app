<?php

namespace App\Providers\Filament;

use App\Filament\User\Widgets\UserInfoWidget;
use App\Filament\User\Widgets\UserLatestTicketsWidget;
use App\Filament\User\Widgets\UserTicketStatsWidget;
use App\Http\Middleware\CheckProfileCompletion;
use App\Livewire\MyPersonalInfo;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages\Dashboard;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets\AccountWidget;
use Filament\Widgets\FilamentInfoWidget;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Jeffgreco13\FilamentBreezy\BreezyCore;
use FinityLabs\FinAvatar\AvatarProviders\UiAvatarsProvider;


class UserPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->id('user')
            ->path('user-panel')
            // Включение режима SPA
            ->spa()
            // Настройка шрифта, возможно изменить
            ->font("IBM Plex Sans")
            // Плагин для аватаров
            ->defaultAvatarProvider(UiAvatarsProvider::class)
            // явный домашний URL
            ->homeUrl('/user-panel')
            // Cтраница входа Breezy
            ->login()
            // Cтраница регистрации Breezy
            ->registration()
            // Функция восстановления пароля
            ->passwordReset()
            // Функция подтверждения почты
            ->emailVerification()
            // Настройка цветов
            ->colors([
                'primary' => Color::Emerald,
            ])
            ->discoverResources(in: app_path('Filament/User/Resources'), for: 'App\Filament\User\Resources')
            ->discoverPages(in: app_path('Filament/User/Pages'), for: 'App\Filament\User\Pages')
            ->pages([
                Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/User/Widgets'), for: 'App\Filament\User\Widgets')
            ->widgets([
                AccountWidget::class,
                FilamentInfoWidget::class,
                UserTicketStatsWidget::class,
                UserLatestTicketsWidget::class,
            ])
            // Подключение плагинов
            ->plugins([
                // Плагин для авторизации и регистрации
                BreezyCore::make()
                    ->myProfileComponents([
                        'personal_info' => MyPersonalInfo::class,
                    ])
                    ->myProfile(
                        // пункт "Профиль" в меню пользователя
                        shouldRegisterUserMenu: true,
                        // не показывать в боковом меню
                        shouldRegisterNavigation: false,
                        // включить аватарки
                        hasAvatars: false,
                        // префикс
                        // slug: 'profile'
                    )
                    // Включение сессий
                    ->enableBrowserSessions()
                    // Требование к двухфакторной аутентификации
                    ->enableTwoFactorAuthentication(force: false)

            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
                CheckProfileCompletion::class,
            ])
            ->authMiddleware([
                Authenticate::class,
                'user.panel',
            ]);
    }
}
