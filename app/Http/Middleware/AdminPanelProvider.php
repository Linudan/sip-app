<?php

namespace App\Providers\Filament;

use AlizHarb\ActivityLog\ActivityLogPlugin;
use AlizHarb\ActivityLog\Widgets\ActivityHeatmapWidget;
use AlizHarb\ActivityLog\Widgets\ActivityStatsWidget;
use AlizHarb\ActivityLog\Widgets\LatestActivityWidget;
use App\Filament\Widgets\EquipmentStatsWidget;
use App\Filament\Widgets\LatestTicketsWidget;
use App\Filament\Widgets\NewEquipmentWidget;
use App\Filament\Widgets\QrScannerWidget;
use App\Filament\Widgets\TicketStatsWidget;
use CharrafiMed\GlobalSearchModal\GlobalSearchModalPlugin;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Navigation\NavigationGroup;
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
use ShuvroRoy\FilamentSpatieLaravelBackup\FilamentSpatieLaravelBackupPlugin;
use FinityLabs\FinAvatar\AvatarProviders\UiAvatarsProvider;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->navigationGroups([
                // Создание группы "Управление пользователями"
                NavigationGroup::make()
                    ->label(fn (): string => __('filament-panels::resources.groups.users_group_label')),
                // Создание группы "Управление заявками"
                NavigationGroup::make()
                    ->label(fn (): string => __('filament-panels::resources.groups.tikets_group_label')),
                // Создание группы "Управление оборудованием"
                NavigationGroup::make()
                    ->label(fn (): string => __('filament-panels::resources.groups.equipments_group_label')),
                // Создание группы "Аудит"
                NavigationGroup::make()
                    ->label(fn (): string => __('filament-panels::resources.groups.audit_group_label')),
                // Создание группы "Настройки"
                NavigationGroup::make()
                    ->label(fn (): string => __('filament-panels::resources.groups.settings_group_label')),
            ])
            ->id('admin')
            ->path('admin')
            ->login()
            // Включение режима SPA
            ->spa()
            // Плагин для аватаров
            ->defaultAvatarProvider(UiAvatarsProvider::class)
            // Включение возможности складования панели навигации
            ->sidebarCollapsibleOnDesktop()
            // Настройка шрифта, возможно изменить
            ->font("IBM Plex Sans")
            // Панель профиля (стандартная Filament)
            ->profile()
            // Явный домашний URL
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
                // Виджеты плагина Activity Log
                ActivityStatsWidget::class,
                ActivityHeatmapWidget::class,

                // Мои виджеты
                AccountWidget::class,
                FilamentInfoWidget::class,
                LatestTicketsWidget::class,
                NewEquipmentWidget::class,
                TicketStatsWidget::class,
                EquipmentStatsWidget::class,
                QrScannerWidget::class,
            ])
            // Подключение плагинов
            ->plugins([
                // Плагин Breezy
                BreezyCore::make()
                    ->myProfile(shouldRegisterNavigation: false)
                    ->enableBrowserSessions(true)
                    ->enableTwoFactorAuthentication(true),
                // Плагин LaravelBackup
                FilamentSpatieLaravelBackupPlugin::make()
                    ->authorize(fn(): bool => auth()->user()?->hasRole(['admin', 'it_specialist'])),
                // Плагин GlobalSearch
                GlobalSearchModalPlugin::make(),
                // Плагин ActivityLog
                ActivityLogPlugin::make()
                    ->navigationGroup(fn (): string => __('filament-panels::resources.groups.audit_group_label'))
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
