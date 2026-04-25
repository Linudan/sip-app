<?php

namespace App\Observers;

use App\Models\EquipmentHistory;
use App\Models\EquipmentItem;
use Psy\Util\Str;

class EquipmentItemObserver
{
    public function updated(EquipmentItem $equipmentItem): void
    {
        if ($equipmentItem->isDirty('current_user_id')) {
            $oldUserId = $equipmentItem->getOriginal('current_user_id');
            $newUserId = $equipmentItem->current_user_id;

            EquipmentHistory::create([
                'user_id'           => auth()->id(),
                'equipment_item_id' => $equipmentItem->id,
                'action'            => $newUserId ? 'assigned' : 'returned',
                'details'           => [
                    'old_user_id' => $oldUserId,
                    'new_user_id' => $newUserId,
                ],
            ]);
        }

        if ($equipmentItem->isDirty('status')) {
            EquipmentHistory::create([
                'user_id'           => auth()->id(),
                'equipment_item_id' => $equipmentItem->id,
                'action'            => 'status_changed',
                'details'           => [
                    'old_status' => $equipmentItem->getOriginal('status'),
                    'new_status' => $equipmentItem->status,
                ],
            ]);
        }
    }

    public function creating(EquipmentItem $equipmentItem): void
{
    if (empty($equipmentItem->qr_code_hash)) {
        $equipmentItem->qr_code_hash = Str::random(32);
    }
}

    public function created(EquipmentItem $equipmentItem): void
    {
        EquipmentHistory::create([
            'user_id'           => auth()->id(),
            'equipment_item_id' => $equipmentItem->id,
            'action'            => 'created',
            'details'           => [],
        ]);
    }
}
