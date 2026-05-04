<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Department extends Model
{
    use SoftDeletes;
    protected $table    = 'departments';
    protected $fillable = ['dep_name', 'description'];

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
