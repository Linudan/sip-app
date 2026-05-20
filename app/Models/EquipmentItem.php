<?php
namespace App\Models;

use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\Image\SvgImageBackEnd;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use BaconQrCode\Writer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Models\Concerns\LogsActivity;
use Spatie\Activitylog\Support\LogOptions;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class EquipmentItem extends Model implements HasMedia
{
    use SoftDeletes;
    use LogsActivity;
    use InteractsWithMedia;

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

    // Включение ресурса в логирование
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
                          // ->logAll(); // Будет логировать все изменения атрибутов
            ->logOnlyDirty(); // Логирование только измененных полей
                          // ->logOnly(['name', 'email']); // Или только указанные поля
    }

    /**
     * Регистрация коллекции для вложений оборудования.
     */
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('equipment_attachments')
            ->useDisk('public');
    }

    /**
     * Автоматически удаляем все файлы при удалении модели.
     */
    protected static function booted()
    {
        static::deleting(function ($equipment) {
            $equipment->clearMediaCollection('equipment_attachments');
        });
    }

    protected function casts(): array
    {
        return [
            'specifications' => 'array',
            'purchase_date'  => 'date',
            'warranty_until' => 'date',
        ];
    }

    // Метод для работы с qr-кодами
    public function getQrCodeImageAttribute(): string
    {
        $data = $this->qr_code_hash ?? $this->inventory_number ?? $this->id;

        $renderer = new ImageRenderer(
            new RendererStyle(150),
            new SvgImageBackEnd()
        );

        $writer = new Writer($renderer);

        return 'data:image/svg+xml;base64,' . base64_encode($writer->writeString($data));
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
