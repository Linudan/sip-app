<?php
namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Jeffgreco13\FilamentBreezy\Traits\TwoFactorAuthenticatable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Activitylog\Models\Concerns\LogsActivity;
use Spatie\Activitylog\Support\LogOptions;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Permission\Traits\HasRoles;
use Spatie\MediaLibrary\HasMedia;

class User extends Authenticatable implements HasMedia
{
    use HasApiTokens;

    /** @use HasFactory<UserFactory> */
    use HasFactory;
    use Notifiable;
    use HasRoles;
    use SoftDeletes;
    use TwoFactorAuthenticatable;
    use LogsActivity;
    use InteractsWithMedia;

    // Включение ресурса в логирование
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        // ->logAll() // Будет логировать все изменения атрибутов
            ->logOnlyDirty();
        // ->logOnly(['name', 'email']); // Или только указанные поля
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'surname',
        'patronymic',
        'email',
        'department_id',
        'position_id',
        'phone',
        'internal_phone',
        'telegram_username',
        'max_username',
        'last_login_at',
        'email_verified_at',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'last_login_at'     => 'datetime',
            'password'          => 'hashed',
        ];
    }

    // ==================== СВЯЗИ ====================

    /**
     * Пользователь принадлежит отделу.
     */
    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }

    public function position()
    {
        return $this->belongsTo(Position::class);
    }

    /**
     * Пользователь создал много заявок.
     */
    public function tickets(): HasMany
    {
        return $this->hasMany(Ticket::class);
    }

    /**
     * Заявки, на которые пользователь назначен как IT-специалист (многие ко многим).
     */
    public function assignedTickets(): BelongsToMany
    {
        return $this->belongsToMany(Ticket::class, 'ticket_assignments')
            ->withPivot('assigned_at', 'is_primary')
            ->withTimestamps();
    }

    /**
     * Записи истории, которые совершил пользователь.
     */
    public function equipmentHistories(): HasMany
    {
        return $this->hasMany(EquipmentHistory::class);
    }

    /**
     * Оборудование, закреплённое за пользователем.
     */
    public function equipmentItems(): HasMany
    {
        return $this->hasMany(EquipmentItem::class, 'current_user_id');
    }

    /**
     * Вложения, загруженные пользователем.
     */
    public function uploadedAttachments(): HasMany
    {
        return $this->hasMany(Attachment::class, 'uploaded_by');
    }

    // ==================== АКСЕССОРЫ ====================

/**
 * Фамилия Имя О. (например: Иванов Иван И.)
 */
    public function getFullNameWithInitialsAttribute(): string
    {
        $initials = $this->patronymic ? mb_substr($this->patronymic, 0, 1) . '.' : '';
        return trim($this->surname . ' ' . $this->name . ($initials ? ' ' . $initials : ''));
    }

    /**
     * Инициалы пользователя.
     */
    public function initials(): string
    {
        return Str::of($this->name)
            ->explode(' ')
            ->take(2)
            ->map(fn($word) => Str::substr($word, 0, 1))
            ->implode('');
    }
}
