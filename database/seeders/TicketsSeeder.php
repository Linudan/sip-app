<?php
namespace Database\Seeders;

use App\Models\EquipmentItem;
use App\Models\Ticket;
use App\Models\TicketCategory;
use App\Models\User;
use Illuminate\Database\Seeder;

class TicketsSeeder extends Seeder
{
    public function run(): void
    {
        $notWorkingCat = TicketCategory::where('name', 'Оборудование не работает')->first();
        $softwareCat   = TicketCategory::where('name', 'Требуется ПО')->first();
        $consultCat    = TicketCategory::where('name', 'Консультация')->first();

        $hr      = User::where('email', 'hr@example.com')->first();
        $legal   = User::where('email', 'legal@example.com')->first();
        $finance = User::where('email', 'finance@example.com')->first();
        $it1     = User::where('email', 'it1@example.com')->first();
        $it2     = User::where('email', 'it2@example.com')->first();

        $pc = EquipmentItem::where('inventory_number', 'INV-001')->first();

        $ticketsData = [
            [
                'ticket_number'     => 'TICKET-001',
                'user_id'           => $hr->id,
                'category_id'       => $notWorkingCat->id,
                'equipment_item_id' => $pc->id,
                'title'             => 'Не включается компьютер',
                'description'       => 'После включения слышен шум, но экран не загорается',
                'priority'          => 'high',
                'status'            => 'in_progress',
                'created_at'        => now()->subDays(2),
                'updated_at'        => now()->subDay(),
                'assignments'       => [
                    ['user_id' => $it1->id, 'is_primary' => true, 'assigned_at' => now()->subDay()],
                ],
            ],
            [
                'ticket_number'     => 'TICKET-002',
                'user_id'           => $legal->id,
                'category_id'       => $softwareCat->id,
                'equipment_item_id' => null,
                'title'             => 'Установка Adobe Acrobat',
                'description'       => 'Нужна лицензионная версия Adobe Acrobat Pro',
                'priority'          => 'medium',
                'status'            => 'new',
                'created_at'        => now()->subDay(),
                'updated_at'        => now()->subDay(),
                'assignments'       => [],
            ],
            [
                'ticket_number'     => 'TICKET-003',
                'user_id'           => $finance->id,
                'category_id'       => $consultCat->id,
                'equipment_item_id' => null,
                'title'             => 'Проблемы с Excel: не работают макросы',
                'description'       => 'Макросы отключены, но в настройках включены. Нужна консультация.',
                'priority'          => 'low',
                'status'            => 'resolved',
                'resolved_at'       => now(),
                'user_rating'       => 5,
                'user_feedback'     => 'Спасибо, всё работает!',
                'created_at'        => now()->subDays(5),
                'updated_at'        => now(),
                'assignments'       => [
                    ['user_id' => $it2->id, 'is_primary' => true, 'assigned_at' => now()->subDays(4)],
                ],
            ],
            [
                'ticket_number'     => 'TICKET-004',
                'user_id'           => $hr->id,
                'category_id'       => $notWorkingCat->id,
                'equipment_item_id' => $pc->id,
                'title'             => 'МФУ не печатает',
                'description'       => 'Принтер выдает ошибку "Отсутствует бумага", хотя лоток полный',
                'priority'          => 'critical',
                'status'            => 'pending',
                'created_at'        => now()->subDays(1),
                'updated_at'        => now()->subHours(12),
                'assignments'       => [
                    ['user_id' => $it1->id, 'is_primary' => true, 'assigned_at' => now()->subHours(12)],
                    ['user_id' => $it2->id, 'is_primary' => false, 'assigned_at' => now()->subHours(12)],
                ],
            ],
            [
                'ticket_number'     => 'TICKET-005',
                'user_id'           => $legal->id,
                'category_id'       => $consultCat->id,
                'equipment_item_id' => null,
                'title'             => 'Доступ к внутреннему порталу',
                'description'       => 'Не могу зайти на портал, пишет "доступ запрещен"',
                'priority'          => 'medium',
                'status'            => 'closed',
                'closed_at'         => now()->subDays(3),
                'user_rating'       => 4,
                'user_feedback'     => 'Помогли, но пришлось ждать',
                'created_at'        => now()->subDays(7),
                'updated_at'        => now()->subDays(3),
                'assignments'       => [
                    ['user_id' => $it1->id, 'is_primary' => true, 'assigned_at' => now()->subDays(6)],
                ],
            ],
        ];

        foreach ($ticketsData as $data) {
            $assignments = $data['assignments'];
            unset($data['assignments']);
            $ticket = Ticket::create($data);
            foreach ($assignments as $assignment) {
                $ticket->assignedUsers()->attach($assignment['user_id'], [
                    'assigned_at' => $assignment['assigned_at'],
                    'is_primary'  => $assignment['is_primary'],
                ]);
            }
        }
    }
}
