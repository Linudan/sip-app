<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Сброс кеша прав
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Создание разрешений (permissions)

        // Пользователи и отделы
        Permission::create(['name' => 'view users']);
        Permission::create(['name' => 'create users']);
        Permission::create(['name' => 'edit users']);
        Permission::create(['name' => 'delete users']);
        Permission::create(['name' => 'view departments']);
        Permission::create(['name' => 'create departments']);
        Permission::create(['name' => 'edit departments']);
        Permission::create(['name' => 'delete departments']);

        // Оборудование
        Permission::create(['name' => 'view equipment']);
        Permission::create(['name' => 'create equipment']);
        Permission::create(['name' => 'edit equipment']);
        Permission::create(['name' => 'delete equipment']);
        Permission::create(['name' => 'assign equipment']);
        Permission::create(['name' => 'view equipment history']);

                                                            // Заявки
        Permission::create(['name' => 'view own tickets']); // просмотр своих заявок
        Permission::create(['name' => 'create tickets']);
        Permission::create(['name' => 'edit own tickets']); // редактировать свои заявки (может быть ограничено)
        Permission::create(['name' => 'view all tickets']);
        Permission::create(['name' => 'manage tickets']); // назначение, изменение статуса, комментарии
        Permission::create(['name' => 'delete tickets']);

        // Категории (для оборудования и заявок) - управление справочниками
        Permission::create(['name' => 'manage equipment categories']);
        Permission::create(['name' => 'manage ticket categories']);

        // Аналитика
        Permission::create(['name' => 'view analytics']);

        // ==================================

        // Создание ролей и назначение разрешений

        // Роль обычного пользователя
        $userRole = Role::create(['name' => 'user']);
        $userRole->givePermissionTo([
            'view own tickets',
            'create tickets',
            'edit own tickets',
        ]);

        // Роль IT-специалиста
        $itRole = Role::create(['name' => 'it_specialist']);
        $itRole->givePermissionTo([
            'view all tickets',
            'manage tickets',
            'view equipment',
            'create equipment',
            'edit equipment',
            'assign equipment',
            'view equipment history',
            'view users', // чтобы видеть, кому назначать
        ]);

        // Роль администратора
        $adminRole = Role::create(['name' => 'admin']);
        $adminRole->givePermissionTo(Permission::all()); // все разрешения

        // ==================================
    }
}
