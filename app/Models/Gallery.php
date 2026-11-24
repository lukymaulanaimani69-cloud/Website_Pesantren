<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Gallery extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'status',
    ];

    public function media(): HasMany
    {
        return $this->hasMany(GalleryMedia::class)->orderBy('sort_order', 'asc');
    }

    public function scopePublished($query)
    {
        return $query->where('status', 'published');
    }
}
