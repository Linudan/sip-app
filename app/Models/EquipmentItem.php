<?php
namespace App\Models;

use BaconQrCode\Renderer\Image\SvgImageBackEnd;
use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use BaconQrCode\Writer;
use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\Writer\SvgWriter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Models\Concerns\LogsActivity;
use Spatie\Activitylog\Support\LogOptions;

class EquipmentItem extends Model
{
    use SoftDeletes;
    use LogsActivity;

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
            ->logAll(); // Будет логировать все изменения атрибутов
            // ->logOnlyDirty() // Логирование только измененных полей
            // ->logOnly(['name', 'email']); // Или только указанные поля
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
