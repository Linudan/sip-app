<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Activitylog\Models\Concerns\LogsActivity;
use Spatie\Activitylog\Support\LogOptions;

class EquipmentCategory extends Model
{

    use LogsActivity;

    protected $table    = 'equipment_categories';
    protected $fillable = ['name', 'slug', 'description', 'parent_id', 'icon'];

    // Включение ресурса в логирование
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logAll(); // Будет логировать все изменения атрибутов
            // ->logOnlyDirty() // Логирование только измененных полей
            // ->logOnly(['name', 'email']); // Или только указанные поля
    }

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
