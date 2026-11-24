<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SiteSetting;

class SiteSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            'site_name' => 'Pondok Pesantren Damanhuri Romly',
            'site_tagline' => 'Mencetak Generasi Berakhlak Mulia, Berilmu Luas, dan Berwawasan Global.',
            'site_description' => 'Website Resmi Pondok Pesantren Damanhuri Romly Genggong Probolinggo.',
            'contact_email' => 'kontak@damanhuriromly.sch.id',
            'contact_phone' => '(0335) xxxxxxx',
            'address' => 'Genggong, Probolinggo, Jawa Timur',
            'logo_path' => 'images/LOGO_PDR-removebg-preview.png',
        ];

        foreach ($settings as $key => $value) {
            SiteSetting::set($key, $value);
        }
    }
}
