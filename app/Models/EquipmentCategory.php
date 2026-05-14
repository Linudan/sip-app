<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class EquipmentCategory extends Model
{
    protected $table    = 'equipment_categories';
    protected $fillable = ['name', 'slug', 'description', 'parent_id', 'icon'];

    // Категория принадлежит родительской категории
    public function parent(): BelongsTo
    {
        return $this->belongsTo(EquipmentCategory::class, 'parent_id');
    }

    // Категория имеет множество дочерних категорий
    public function children(): HasMany
    {
        return $this->hasMany(EquipmentCategory::class, 'parent_id');
    }

    // В одной категории множество оборудования
    public function equipmentItems(): HasMany
    {
            return $this->hasMany(EquipmentItem::class, 'category_id');
    }
}
