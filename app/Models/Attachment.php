<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Attachment extends Model
{
    /**
     * Атрибуты, доступные для массового заполнения.
     *
     * @var list<string>
     */
    protected $fillable = [
        'attachable_type', 'attachable_id', 'file_path', 'original_name',
        'mime_type', 'size', 'uploaded_by',
    ];

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
