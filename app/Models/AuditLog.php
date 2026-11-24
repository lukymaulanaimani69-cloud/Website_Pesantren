<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AuditLog extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'actor_id',
        'action',
        'subject_type',
        'subject_id',
        'metadata_json',
        'ip_address',
        'created_at',
    ];

    protected function casts(): array
    {
        return [
            'metadata_json' => 'array',
            'created_at' => 'datetime',
        ];
    }

    public function actor(): BelongsTo
    {
        return $this->belongsTo(User::class, 'actor_id');
    }

    public static function record(string $action, ?Model $subject = null, array $metadata = []): self
    {
        // Sanitize metadata to never include sensitive values
        $sanitized = collect($metadata)->except([
            'password', 'password_confirmation', 'token', 'remember_token', '_token', 'secret'
        ])->toArray();

        return static::create([
            'actor_id' => auth()->id(),
            'action' => $action,
            'subject_type' => $subject ? get_class($subject) : null,
            'subject_id' => $subject?->getKey(),
            'metadata_json' => $sanitized,
            'ip_address' => request()->ip(),
            'created_at' => now(),
        ]);
    }
}
