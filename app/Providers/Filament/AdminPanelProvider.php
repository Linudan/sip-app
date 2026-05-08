<?php

namespace App\Providers\Filament;

use App\Filament\Widgets\EquipmentStatsWidget;
use App\Filament\Widgets\LatestTicketsWidget;
use App\Filament\Widgets\NewEquipmentWidget;
use App\Filament\Widgets\TicketStatsWidget;
use App\Filament\Widgets\UsefulLinksWidget;
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

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->login()
            // Включение режима SPA
            ->spa()
            // Включение возможности складования панели навигации
            ->sidebarCollapsibleOnDesktop()
            // Настройка шрифта, возможно изменить
            ->font("IBM Plex Sans")
            // Панель профиля (стандартная Filament)
            ->profile()
            // явный домашний URL
            ->homeUrl('/admin')
            // Настройка цветов
            ->colors([
                'primary' => Color::Indigo,
            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\Filament\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\Filament\Pages')
            ->pages([
                Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\Filament\Widgets')
            ->widgets([
                AccountWidget::class,
                FilamentInfoWidget::class,
                LatestTicketsWidget::class,
                NewEquipmentWidget::class,
                TicketStatsWidget::class,
                EquipmentStatsWidget::class,
            ])
            // Подключение плагинов
            ->plugins([
                BreezyCore::make()
                    ->myProfile(shouldRegisterNavigation: false)
                    ->enableBrowserSessions()
                    ->enableTwoFactorAuthentication(false)
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
            ])
            ->authMiddleware([
                Authenticate::class,
                'admin.panel',
            ]);
    }
}
