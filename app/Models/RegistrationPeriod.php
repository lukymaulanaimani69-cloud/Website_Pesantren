<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class RegistrationPeriod extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'academic_year',
        'opens_at',
        'closes_at',
        'is_active',
        'requirements_text',
        'description',
    ];

    protected function casts(): array
    {
        return [
            'opens_at' => 'datetime',
            'closes_at' => 'datetime',
            'is_active' => 'boolean',
        ];
    }

    public function registrations(): HasMany
    {
        return $this->hasMany(Registration::class);
    }

    public function isOpen(): bool
    {
        return $this->is_active && now()->between($this->opens_at, $this->closes_at);
    }

    public static function currentActive(): ?self
    {
        return static::where('is_active', true)
            ->where('opens_at', '<=', now())
            ->where('closes_at', '>=', now())
            ->first();
    }
}
