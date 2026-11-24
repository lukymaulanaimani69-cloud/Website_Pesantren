<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class SiteSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'setting_key',
        'setting_value',
        'type',
        'group',
        'label',
        'description',
    ];

    public static function get(string $key, mixed $default = null): mixed
    {
        return Cache::rememberForever("site_setting_{$key}", function () use ($key, $default) {
            $setting = static::where('setting_key', $key)->first();
            return $setting ? $setting->setting_value : $default;
        });
    }

    public static function set(string $key, mixed $value, ?string $group = 'general', ?string $type = 'text', ?string $label = null): void
    {
        static::updateOrCreate(
            ['setting_key' => $key],
            [
                'setting_value' => $value,
                'group' => $group ?? 'general',
                'type' => $type ?? 'text',
                'label' => $label,
            ]
        );

        Cache::forget("site_setting_{$key}");
    }
}
