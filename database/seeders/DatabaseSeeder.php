<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            RolesAndPermissionsSeeder::class,
            DepartmentsSeeder::class,
            PositionSeeder::class,
            UsersSeeder::class,
            EquipmentCategoriesSeeder::class,
            TicketCategoriesSeeder::class,
            EquipmentItemsSeeder::class,
            TicketsSeeder::class,
        ]);
    }
}
