<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ticket extends Model
{
    use SoftDeletes;

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

    protected static function booted()
{
    parent::booted(); // если есть другие вызовы

    static::deleting(function ($ticket) {
        // Удаляем все вложения, привязанные к заявке
        $ticket->attachments()->each(function ($attachment) {
            $attachment->delete();
        });
    });
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

    /**
     * Вложения, прикреплённые к заявке (полиморфная связь).
     */
    public function attachments(): MorphMany
    {
        return $this->morphMany(Attachment::class, 'attachable');
    }
}
