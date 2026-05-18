<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Models\Concerns\LogsActivity;
use Spatie\Activitylog\Support\LogOptions;

class Department extends Model
{
    use SoftDeletes;
    use LogsActivity;

    protected $table    = 'departments';
    protected $fillable = ['dep_name', 'description'];

    // Включение ресурса в логирование
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logAll(); // Будет логировать все изменения атрибутов
            // ->logOnlyDirty() // Логирование только измененных полей
            // ->logOnly(['name', 'email']); // Или только указанные поля
    }

    // В отделе может состоять много пользователей
    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }

    // У отдела может быть много оборудования
    public function equipmentItems(): HasMany
    {
        return $this->hasMany(EquipmentItem::class);
    }
}
