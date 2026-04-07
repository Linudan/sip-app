<?php
namespace Database\Seeders;

use App\Models\TicketCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TicketCategoriesSeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Оборудование не работает', 'description' => 'Поломка или сбой работы оборудования'],
            ['name' => 'Требуется ПО', 'description' => 'Установка, настройка или обновление программного обеспечения'],
            ['name' => 'Консультация', 'description' => 'Помощь в работе с программами или оборудованием'],
            ['name' => 'Сеть и доступ', 'description' => 'Проблемы с интернетом, Wi-Fi, доступом к ресурсам'],
            ['name' => 'Заявка на оборудование', 'description' => 'Запрос на выдачу нового или дополнительного оборудования'],
        ];

        foreach ($categories as $cat) {
            TicketCategory::create([
                'name'        => $cat['name'],
                'slug'        => Str::slug($cat['name']),
                'description' => $cat['description'],
            ]);
        }
    }
}
