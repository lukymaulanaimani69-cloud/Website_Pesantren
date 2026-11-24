<?php

namespace App\Models;

use App\Enums\UserRole;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'role',
        'is_active',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'role' => UserRole::class,
            'is_active' => 'boolean',
        ];
    }

    public function isSuperAdmin(): bool
    {
        return $this->role === UserRole::SUPER_ADMIN;
    }

    public function isEditor(): bool
    {
        return $this->role === UserRole::EDITOR;
    }

    public function isPsbOfficer(): bool
    {
        return $this->role === UserRole::PSB_OFFICER;
    }

    public function isApplicant(): bool
    {
        return $this->role === UserRole::APPLICANT;
    }

    public function canManageContent(): bool
    {
        return in_array($this->role, [UserRole::SUPER_ADMIN, UserRole::EDITOR], true);
    }

    public function canReviewPsb(): bool
    {
        return in_array($this->role, [UserRole::SUPER_ADMIN, UserRole::PSB_OFFICER], true);
    }

    public function registrations(): HasMany
    {
        return $this->hasMany(Registration::class);
    }

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class, 'author_id');
    }

    public function auditLogs(): HasMany
    {
        return $this->hasMany(AuditLog::class, 'actor_id');
    }
}
