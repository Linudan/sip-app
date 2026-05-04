<?php
namespace App\Http\Middleware;

use Closure;
use Filament\Notifications\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserPanelAccess
{
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();

        if (! $user) {
            return redirect()->route('filament.user.auth.login');
        }

        // Разрешаем доступ только user (НЕ admin и НЕ it_specialist)
        if ($user->hasRole('user')) {
            return $next($request);
        }

        // Пользователь залогинен, но не имеет права – выходим
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        Notification::make()
            ->title(__('filament-panels::error-notifications.access_denied_user'))
            ->danger()
            ->persistent()
            ->send();

        return redirect()->route('filament.user.auth.login');
    }
}
