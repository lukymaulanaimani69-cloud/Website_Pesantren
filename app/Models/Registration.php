<?php

namespace App\Models;

use App\Enums\RegistrationStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Registration extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'registration_period_id',
        'registration_number',
        'student_name',
        'gender',
        'birth_place',
        'birth_date',
        'previous_school',
        'guardian_name',
        'guardian_relation',
        'guardian_contact',
        'address',
        'chosen_program',
        'notes',
        'status',
        'admin_notes',
        'submitted_at',
        'verified_at',
        'decided_at',
    ];

    protected function casts(): array
    {
        return [
            'status' => RegistrationStatus::class,
            'birth_date' => 'date',
            'submitted_at' => 'datetime',
            'verified_at' => 'datetime',
            'decided_at' => 'datetime',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function period(): BelongsTo
    {
        return $this->belongsTo(RegistrationPeriod::class, 'registration_period_id');
    }

    public function documents(): HasMany
    {
        return $this->hasMany(RegistrationDocument::class);
    }

    public function histories(): HasMany
    {
        return $this->hasMany(RegistrationStatusHistory::class)->orderBy('created_at', 'desc');
    }

    public function scopeForUser($query, int $userId)
    {
        return $query->where('user_id', $userId);
    }

    public function generateUniqueRegistrationNumber(): string
    {
        $year = now()->format('Y');
        $prefix = "PSB-{$year}-";
        $latest = static::where('registration_number', 'LIKE', "{$prefix}%")
            ->orderByDesc('id')
            ->first();

        $number = 1;
        if ($latest && preg_match('/-(\d+)$/', $latest->registration_number, $matches)) {
            $number = intval($matches[1]) + 1;
        }

        return $prefix . str_pad((string)$number, 4, '0', STR_PAD_LEFT);
    }
}
