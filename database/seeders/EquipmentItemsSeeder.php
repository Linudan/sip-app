<?php
namespace Database\Seeders;

use App\Models\EquipmentCategory;
use App\Models\EquipmentItem;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class EquipmentItemsSeeder extends Seeder
{
    public function run(): void
    {
        $computersCat = EquipmentCategory::where('name', 'Компьютеры')->first();
        $laptopsCat   = EquipmentCategory::where('name', 'Ноутбуки')->first();
        $monitorsCat  = EquipmentCategory::where('name', 'Мониторы')->first();
        $mfpCat       = EquipmentCategory::where('name', 'МФУ')->first();

        $hr    = User::where('email', 'hr@example.com')->first();
        $legal = User::where('email', 'legal@example.com')->first();

        $items = [
            [
                'category_id'           => $computersCat->id,
                'name'                  => 'Системный блок HP ProDesk 600 G5',
                'inventory_number'      => 'INV-001',
                'serial_number'         => 'SN-HP001',
                'manufacturer'          => 'HP',
                'model'                 => 'ProDesk 600 G5',
                'specifications'        => json_encode(['cpu' => 'Intel i5-9500', 'ram' => '16GB', 'storage' => '512GB SSD']),
                'status'                => 'in_use',
                'current_user_id'       => $hr->id,
                'current_department_id' => $hr->department_id,
                'purchase_date'         => '2023-01-15',
                'warranty_until'        => '2025-01-15',
                'purchase_price'        => 45000.00,
                'notes'                 => 'Основной компьютер отдела кадров',
                'qr_code_hash'          => Str::random(32),
            ],
            [
                'category_id'           => $laptopsCat->id,
                'name'                  => 'Ноутбук Lenovo ThinkPad X1 Carbon',
                'inventory_number'      => 'INV-002',
                'serial_number'         => 'SN-LEN002',
                'manufacturer'          => 'Lenovo',
                'model'                 => 'ThinkPad X1 Carbon',
                'specifications'        => json_encode(['cpu' => 'Intel i7-10510U', 'ram' => '16GB', 'storage' => '512GB NVMe']),
                'status'                => 'in_use',
                'current_user_id'       => $legal->id,
                'current_department_id' => $legal->department_id,
                'purchase_date'         => '2023-03-20',
                'warranty_until'        => '2026-03-20',
                'purchase_price'        => 85000.00,
                'notes'                 => 'Ноутбук для юриста',
                'qr_code_hash'          => Str::random(32),
            ],
            [
                'category_id'           => $monitorsCat->id,
                'name'                  => 'Монитор Dell UltraSharp 27"',
                'inventory_number'      => 'INV-003',
                'serial_number'         => 'SN-DELL003',
                'manufacturer'          => 'Dell',
                'model'                 => 'U2723QE',
                'specifications'        => json_encode(['resolution' => '3840x2160', 'size' => '27"']),
                'status'                => 'in_stock',
                'current_user_id'       => null,
                'current_department_id' => null,
                'purchase_date'         => '2023-05-10',
                'warranty_until'        => '2025-05-10',
                'purchase_price'        => 32000.00,
                'notes'                 => 'Новый монитор, на складе',
                'qr_code_hash'          => Str::random(32),
            ],
            [
                'category_id'           => $mfpCat->id,
                'name'                  => 'МФУ Canon iR-ADV C3325',
                'inventory_number'      => 'INV-004',
                'serial_number'         => 'SN-CAN004',
                'manufacturer'          => 'Canon',
                'model'                 => 'iR-ADV C3325',
                'specifications'        => json_encode(['print_speed' => '25 ppm', 'color' => 'yes']),
                'status'                => 'in_repair',
                'current_user_id'       => null,
                'current_department_id' => $hr->department_id,
                'purchase_date'         => '2022-11-01',
                'warranty_until'        => '2024-11-01',
                'purchase_price'        => 120000.00,
                'notes'                 => 'В ремонте, ожидаем запчасти',
                'qr_code_hash'          => Str::random(32),
            ],
            [
                'category_id'           => $computersCat->id,
                'name'                  => 'Системный блок Dell OptiPlex 3080',
                'inventory_number'      => 'INV-005',
                'serial_number'         => 'SN-DELL005',
                'manufacturer'          => 'Dell',
                'model'                 => 'OptiPlex 3080',
                'specifications'        => json_encode(['cpu' => 'Intel i3-10100', 'ram' => '8GB', 'storage' => '256GB SSD']),
                'status'                => 'written_off',
                'current_user_id'       => null,
                'current_department_id' => null,
                'purchase_date'         => '2020-08-15',
                'warranty_until'        => '2022-08-15',
                'purchase_price'        => 28000.00,
                'notes'                 => 'Списано по истечении срока службы',
                'qr_code_hash'          => Str::random(32),
            ],
        ];

        foreach ($items as $item) {
            EquipmentItem::create($item);
        }
    }
}
