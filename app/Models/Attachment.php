<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Spatie\Activitylog\Models\Concerns\LogsActivity;
use Spatie\Activitylog\Support\LogOptions;

class Attachment extends Model
{

    use LogsActivity;

    /**
     * Атрибуты, доступные для массового заполнения.
     *
     * @var list<string>
     */
    protected $fillable = [
        'attachable_type', 'attachable_id', 'file_path', 'original_name',
        'mime_type', 'size', 'uploaded_by',
    ];

    // Включение ресурса в логирование
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logAll(); // Будет логировать все изменения атрибутов
            // ->logOnlyDirty() // Логирование только измененных полей
            // ->logOnly(['name', 'email']); // Или только указанные поля
    }

    protected static function booted()
    {
        static::deleting(function ($attachment) {
            $attachment->deleteFile();
        });
    }

    public function deleteFile(): void
    {
        if ($this->file_path && Storage::disk('public')->exists($this->file_path)) {
            Storage::disk('public')->delete($this->file_path);
        }
    }

    // ==================== СВЯЗИ ====================

    /**
     * Полиморфная связь: к какой сущности прикреплено вложение.
     */
    public function attachable(): MorphTo
    {
        return $this->morphTo();
    }

    /**
     * Пользователь, загрузивший вложение.
     */
    public function uploader(): BelongsTo
    {
        return $this->belongsTo(User::class, 'uploaded_by');
    }
}
