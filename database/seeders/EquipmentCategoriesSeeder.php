<?php
namespace Database\Seeders;

use App\Models\EquipmentCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class EquipmentCategoriesSeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Компьютеры', 'description' => 'Стационарные ПК, системные блоки'],
            ['name' => 'Ноутбуки', 'description' => 'Портативные компьютеры'],
            ['name' => 'Мониторы', 'description' => 'Дисплеи для ПК'],
            ['name' => 'МФУ', 'description' => 'Многофункциональные устройства (принтер, сканер, копир)'],
            ['name' => 'Телефония', 'description' => 'Стационарные и IP-телефоны'],
            ['name' => 'Сетевое оборудование', 'description' => 'Коммутаторы, маршрутизаторы, точки доступа'],
        ];

        foreach ($categories as $cat) {
            EquipmentCategory::create([
                'name'        => $cat['name'],
                'slug'        => Str::slug($cat['name']),
                'description' => $cat['description'],
            ]);
        }
    }
}
