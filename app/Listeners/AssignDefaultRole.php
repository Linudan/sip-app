<?php

namespace App\Listeners;

use Filament\Auth\Events\Registered;
use Spatie\Permission\Models\Role;

class AssignDefaultRole
{
    public function handle(Registered $event): void
    {
        // Используем геттер вместо прямого обращения к свойству
        $user = $event->getUser();
        $role = Role::firstOrCreate(['name' => 'user']);
        $user->assignRole($role);
    }
}
