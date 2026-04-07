<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EquipmentHistory extends Model
{
    protected $fillable = [
        'user_id', 'equipment_item_id', 'action', 'details',
    ];

    protected function casts(): array
    {
        return [
            'details' => 'array',
        ];
    }

    // ==================== СВЯЗИ ====================

    /**
     * Пользователь, совершивший действие.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Единица оборудования, с которой связано действие.
     */
    public function equipmentItem(): BelongsTo
    {
        return $this->belongsTo(EquipmentItem::class);
    }
}
