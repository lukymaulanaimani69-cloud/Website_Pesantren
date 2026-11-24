<?php

namespace Database\Seeders;

use App\Models\RegistrationPeriod;
use Illuminate\Database\Seeder;

class RegistrationPeriodSeeder extends Seeder
{
    public function run(): void
    {
        RegistrationPeriod::firstOrCreate(
            ['name' => 'Gelombang 1 - PSB 2026/2027'],
            [
                'academic_year' => '2026/2027',
                'opens_at' => now()->subDays(5),
                'closes_at' => now()->addMonths(2),
                'is_active' => true,
                'description' => 'Pendaftaran gelombang pertama untuk jenjang Madrasah Tsanawiyah, Aliyah, dan Program Tahfidz Al-Qur\'an.',
                'requirements_text' => "- Mengisi formulir identitas calon santri dan wali dengan benar.\n- Mengunggah berkas scan/foto Kartu Keluarga (KK).\n- Mengunggah berkas scan Akta Kelahiran.\n- Mengunggah surat keterangan lulus / rapor semester terakhir.\n- Mengunggah pas foto calon santri berlatar belakang biru atau merah.",
            ]
        );
    }
}
