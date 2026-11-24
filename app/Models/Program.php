<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Program extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'summary',
        'body',
        'featured_media_id',
        'featured_image',
        'status',
        'sort_order',
    ];

    public function featuredMedia(): BelongsTo
    {
        return $this->belongsTo(MediaFile::class, 'featured_media_id');
    }

    public function scopePublished($query)
    {
        return $query->where('status', 'published')->orderBy('sort_order', 'asc');
    }

    public function getImageUrlAttribute(): ?string
    {
        if ($this->featured_image) {
            if (str_starts_with($this->featured_image, 'http://') || str_starts_with($this->featured_image, 'https://')) {
                return $this->featured_image;
            }

            if (str_starts_with($this->featured_image, 'storage/')) {
                return asset($this->featured_image);
            }

            return asset('storage/' . $this->featured_image);
        }

        if ($this->featuredMedia) {
            return $this->featuredMedia->url;
        }

        return null;
    }
}
