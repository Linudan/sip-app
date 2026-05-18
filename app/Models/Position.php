<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Activitylog\Models\Concerns\LogsActivity;
use Spatie\Activitylog\Support\LogOptions;

class Position extends Model
{

    use LogsActivity;

    protected $fillable = ['name', 'description'];

    // Включение ресурса в логирование
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logAll(); // Будет логировать все изменения атрибутов
            // ->logOnlyDirty() // Логирование только измененных полей
            // ->logOnly(['name', 'email']); // Или только указанные поля
    }

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }
}
