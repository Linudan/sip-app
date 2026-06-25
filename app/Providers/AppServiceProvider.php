<?php
namespace App\Providers;

use App\Listeners\AssignDefaultRole;
use App\Models\EquipmentItem;
use App\Models\Ticket;
use App\Observers\EquipmentItemObserver;
use App\Observers\TicketObserver;
use BezhanSalleh\LanguageSwitch\LanguageSwitch;
use Filament\Auth\Events\Registered;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;

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

        // Observer для EquipmentItem
        EquipmentItem::observe(EquipmentItemObserver::class);
        // Observer для Ticket
        Ticket::observe(TicketObserver::class);
        // Регистрируем слушатель для события регистрации
        Event::listen(
            Registered::class,
            AssignDefaultRole::class,
        );
        URL::forceScheme('https');
    }
}
