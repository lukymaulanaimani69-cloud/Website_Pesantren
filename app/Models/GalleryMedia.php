<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class GalleryMedia extends Model
{
    use HasFactory;

    protected $fillable = [
        'gallery_id',
        'media_file_id',
        'image_path',
        'caption',
        'sort_order',
    ];

    public function gallery(): BelongsTo
    {
        return $this->belongsTo(Gallery::class);
    }

    public function mediaFile(): BelongsTo
    {
        return $this->belongsTo(MediaFile::class, 'media_file_id');
    }

    public function getUrlAttribute(): ?string
    {
        if ($this->image_path) {
            return asset($this->image_path);
        }

        if ($this->mediaFile) {
            return $this->mediaFile->url;
        }

        return null;
    }
}
