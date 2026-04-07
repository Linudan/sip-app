<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class EquipmentItem extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'category_id', 'name', 'inventory_number', 'serial_number',
        'manufacturer', 'model', 'specifications', 'status',
        'purchase_date', 'warranty_until', 'purchase_price',
        'current_user_id', 'department_id', 'notes', 'qr_code_hash',
    ];

    protected function casts(): array
    {
        return [
            'specifications' => 'array',
            'purchase_date'  => 'date',
            'warranty_until' => 'date',
        ];
    }

    protected static function booted()
{
    static::deleting(function ($item) {
        // Например, при мягком удалении оборудования снимаем текущее назначение
        if ($item->currentAssignment) {
            $item->currentAssignment->update(['is_current' => false]);
        }
    });
}

    // ==================== СВЯЗИ ====================

    /**
     * Оборудование принадлежит категории.
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(EquipmentCategory::class);
    }

    /**
     * Текущий пользователь, использующий оборудование.
     */
    public function currentUser(): BelongsTo
    {
        return $this->belongsTo(User::class, 'current_user_id');
    }

    /**
     * Отдел, которому принадлежит оборудование.
     */
    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }

    /**
     * История назначений оборудования.
     */
    public function assignments(): HasMany
    {
        return $this->hasMany(EquipmentAssignment::class);
    }

    /**
     * История изменений оборудования.
     */
    public function histories(): HasMany
    {
        return $this->hasMany(EquipmentHistory::class);
    }

    /**
     * Заявки, связанные с этим оборудованием.
     */
    public function tickets(): HasMany
    {
        return $this->hasMany(Ticket::class);
    }

    /**
     * Текущее (активное) назначение оборудования.
     */
    public function currentAssignment()
    {
        return $this->hasOne(EquipmentAssignment::class)->where('is_current', true);
    }
}
