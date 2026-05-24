<?php

namespace App\Http\Middleware;

use Closure;
use Filament\Notifications\Notification;
use Illuminate\Http\Request;

class CheckProfileCompletion
{
    public function handle(Request $request, Closure $next)
    {
        $user = auth()->user();

        if (!$user) {
            return $next($request);
        }

        $allowedRoutes = [
            'filament.user.auth.logout',
            'filament.user.auth.login',
            'filament.user.pages.my-profile',
        ];

        if ($request->routeIs($allowedRoutes)) {
            return $next($request);
        }

        $requiredFields = ['surname', 'phone'];
        $missing = [];

        foreach ($requiredFields as $field) {
            if (empty($user->$field)) {
                $missing[] = $field;
            }
        }

        if (!empty($missing)) {
            $missingText = implode(', ', array_map(function($field) {
                return match($field) {
                    'surname' => 'фамилию',
                    'phone' => 'телефон',
                    default => $field,
                };
            }, $missing));

            Notification::make()
                ->title('Заполните профиль')
                ->body("Пожалуйста, укажите: {$missingText}\n\nВы можете сделать это позже, а пока можете выйти через меню пользователя.")
                ->warning()
                ->persistent()
                ->send();

            return redirect()->route('filament.user.pages.my-profile');
        }

        return $next($request);
    }
}
