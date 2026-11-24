<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RegistrationDocument extends Model
{
    use HasFactory;

    protected $fillable = [
        'registration_id',
        'document_type',
        'disk',
        'path',
        'original_name',
        'mime_type',
        'size_bytes',
        'uploaded_at',
    ];

    protected function casts(): array
    {
        return [
            'uploaded_at' => 'datetime',
        ];
    }

    public function registration(): BelongsTo
    {
        return $this->belongsTo(Registration::class);
    }

    public static function documentTypeLabels(): array
    {
        return [
            'kartu_keluarga' => 'Kartu Keluarga (KK)',
            'akta_kelahiran' => 'Akta Kelahiran',
            'ijazah_or_rapor' => 'Ijazah / Surat Keterangan Lulus / Rapor',
            'pas_foto' => 'Pas Foto Calon Santri',
        ];
    }

    public function getDocumentTypeLabelAttribute(): string
    {
        return self::documentTypeLabels()[$this->document_type] ?? ucfirst(str_replace('_', ' ', $this->document_type));
    }
}
