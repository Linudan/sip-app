<?php
namespace App\Providers;

// Для плагина Laguage Switch

use App\Models\EquipmentItem;
use App\Observers\EquipmentItemObserver;
use BezhanSalleh\LanguageSwitch\LanguageSwitch;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Настройка переключателя языка
        LanguageSwitch::configureUsing(function (LanguageSwitch $switch) {
            $switch
                ->locales(['en', 'ru', 'es'])
                ->outsidePanelRoutes([
                    'filament.user.auth.login',
                    'filament.user.auth.register',
                    'filament.admin.auth.login',
                ]
                )
                ->labels([
                    'en' => '🇬🇧 English',
                    'ru' => '🇷🇺 Русский',
                    'es' => '🇪🇸 Español',
                ]);
        });

        EquipmentItem::observe(EquipmentItemObserver::class);

    }
}
