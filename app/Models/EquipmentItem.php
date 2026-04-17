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
        'category_id',
        'name',
        'inventory_number',
        'serial_number',
        'manufacturer',
        'model',
        'specifications',
        'status',
        'purchase_date',
        'warranty_until',
        'purchase_price',
        'current_user_id',
        'current_department_id',
        'notes',
        'qr_code_hash',
    ];

    protected function casts(): array
    {
        return [
            'specifications' => 'array',
            'purchase_date'  => 'date',
            'warranty_until' => 'date',
        ];
    }

    // ==================== СВЯЗИ ====================

    public function category(): BelongsTo
    {
        return $this->belongsTo(EquipmentCategory::class);
    }

    public function currentUser(): BelongsTo
    {
        return $this->belongsTo(User::class, 'current_user_id');
    }

    public function currentDepartment(): BelongsTo
    {
        return $this->belongsTo(Department::class, 'current_department_id');
    }

    public function histories(): HasMany
    {
        return $this->hasMany(EquipmentHistory::class);
    }

    public function tickets(): HasMany
    {
        return $this->hasMany(Ticket::class);
    }
}
