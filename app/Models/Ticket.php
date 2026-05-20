<?php
namespace App\Models;

use App\MediaLibrary\PathGenerators\TicketAttachmentPathGenerator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Models\Concerns\LogsActivity;
use Spatie\Activitylog\Support\LogOptions;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Ticket extends Model implements HasMedia
{
    use SoftDeletes;
    // Для логирования
    use LogsActivity;
    // Для spatie-laravel-media-library
    use InteractsWithMedia;

    /**
     * Атрибуты, доступные для массового заполнения.
     *
     * @var list<string>
     */
    protected $fillable = [
        'ticket_number', 'user_id', 'category_id', 'equipment_item_id',
        'title', 'description', 'priority', 'status',
        'telegram_chat_link', 'max_chat_link',
        'resolved_at', 'closed_at', 'user_rating', 'user_feedback',
    ];

    // Включение ресурса в логирование
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
                          // ->logAll(); // Будет логировать все изменения атрибутов
            ->logOnlyDirty(); // Логирование только измененных полей
                          // ->logOnly(['name', 'email']); // Или только указанные поля
    }

    // Подключение плагина spatie-laravel-media-library к модели
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('tickets_attachments')
            ->useDisk('public');                    // можно указать любой диск
    }

    // Удаление вложений при удалении заявки
    protected static function booted()
{
    static::deleting(function ($ticket) {
        $ticket->clearMediaCollection('tickets_attachments');
    });
}

    /**
     * Приведение типов атрибутов.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'resolved_at' => 'datetime',
            'closed_at'   => 'datetime',
        ];
    }

    // ==================== СВЯЗИ ====================

    /**
     * Пользователь, создавший заявку.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Категория заявки.
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(TicketCategory::class);
    }

    /**
     * Оборудование, к которому относится заявка (если применимо).
     */
    public function equipmentItem(): BelongsTo
    {
        return $this->belongsTo(EquipmentItem::class);
    }

    /**
     * IT-специалисты, назначенные на заявку (многие ко многим).
     */
    public function assignedUsers(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'ticket_assignments')
            ->withPivot('assigned_at', 'is_primary')
            ->withTimestamps();
    }
}
