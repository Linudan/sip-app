<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Filament\Notifications\Notification;

class AdminPanelAccess
{
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('filament.admin.auth.login');
        }

        if ($user->hasRole('admin') || $user->hasRole('it_specialist')) {
            return $next($request);
        }

        // Разлогиниваем
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Сохраняем уведомление в сессию (способ Filament)
        Notification::make()
            ->title(__('filament-panels::error-notifications.access_denied_admin'))
            ->danger()
            ->persistent()
            ->send();

        return redirect()->route('filament.admin.auth.login');
    }
}
