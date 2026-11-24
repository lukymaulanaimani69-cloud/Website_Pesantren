<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\Facility;
use App\Models\Faq;
use App\Models\Gallery;
use App\Models\Page;
use App\Models\Post;
use App\Models\PostCategory;
use App\Models\Program;
use App\Models\StaffProfile;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ContentSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::first();

        // 1. Pages
        Page::firstOrCreate(
            ['slug' => 'sejarah'],
            [
                'author_id' => $admin?->id,
                'title' => 'Sejarah Pondok Pesantren',
                'body' => '<p>Pondok Pesantren Damanhuri Romly bermula dari pengajian halaqah kitab salaf yang diasuh dengan penuh keikhlasan. Seiring waktu dan kepercayaan masyarakat, didirikanlah asrama santri dan unit-unit pendidikan formal serta non-formal.</p><p><em>Catatan: Narasi sejarah komprehensif sedang dalam proses verifikasi dengan pihak dewan masyayikh.</em></p>',
                'meta_description' => 'Sejarah perjalanan dan pendirian Pondok Pesantren Damanhuri Romly.',
                'status' => 'published',
                'published_at' => now(),
            ]
        );

        Page::firstOrCreate(
            ['slug' => 'visi-misi'],
            [
                'author_id' => $admin?->id,
                'title' => 'Visi dan Misi Pesantren',
                'body' => '<h3>Visi Lembaga</h3><p>Mencetak generasi santri yang berakhlakul karimah, unggul dalam tafaqquh fiddin, dan mandiri.</p><h3>Misi Lembaga</h3><ol><li>Menyelenggarakan kajian kitab kuning secara terstruktur.</li><li>Membudayakan adab dan sunnah Rasulullah SAW dalam kehidupan pesantren.</li><li>Mengembangkan potensi keilmuan kontemporer dan literasi digital.</li></ol>',
                'meta_description' => 'Visi dan Misi Pondok Pesantren Damanhuri Romly.',
                'status' => 'published',
                'published_at' => now(),
            ]
        );

        Page::firstOrCreate(
            ['slug' => 'kebijakan-privasi'],
            [
                'author_id' => $admin?->id,
                'title' => 'Kebijakan Privasi & Perlindungan Data Santri',
                'body' => '<p>Pondok Pesantren Damanhuri Romly berkomitmen menjaga kerahasiaan data pribadi calon santri dan wali santri. Data yang dihimpun pada sistem Pendaftaran Santri Baru (PSB) hanya dipergunakan untuk keperluan seleksi administrasi internal dan tidak akan dipublikasikan atau dibagikan kepada pihak ketiga yang tidak berwenang.</p>',
                'meta_description' => 'Kebijakan privasi dan komitmen perlindungan data calon santri dan wali di Pondok Pesantren Damanhuri Romly.',
                'status' => 'published',
                'published_at' => now(),
            ]
        );

        // 2. Categories & Posts
        $catBerita = PostCategory::firstOrCreate(
            ['slug' => 'berita-pesantren'],
            ['name' => 'Berita Pesantren', 'description' => 'Kabar terbaru dan liputan kegiatan di lingkungan pesantren.']
        );

        $catPengumuman = PostCategory::firstOrCreate(
            ['slug' => 'pengumuman'],
            ['name' => 'Pengumuman Resmi', 'description' => 'Pengumuman resmi dari sekretariat dan panitia pesantren.']
        );

        Post::firstOrCreate(
            ['slug' => 'pembukaan-pendaftaran-santri-baru-2026'],
            [
                'category_id' => $catPengumuman->id,
                'author_id' => $admin?->id,
                'title' => 'Pembukaan Pendaftaran Santri Baru Tahun Ajaran 2026/2027',
                'summary' => 'Pondok Pesantren Damanhuri Romly resmi membuka penerimaan santri baru secara daring melalui website.',
                'body' => '<p>Alhamdulillah, panitia PSB Pondok Pesantren Damanhuri Romly mengumumkan pembukaan pendaftaran santri baru untuk tahun ajaran 2026/2027. Para calon santri dan wali santri dapat membuat akun dan melengkapi berkas administrasi melalui portal PSB yang tersedia di website resmi ini.</p>',
                'status' => 'published',
                'published_at' => now()->subDays(2),
            ]
        );

        Post::firstOrCreate(
            ['slug' => 'kegiatan-kajian-kitab-kuning-mingguan'],
            [
                'category_id' => $catBerita->id,
                'author_id' => $admin?->id,
                'title' => 'Semarak Kajian Rutin Kitab Kuning Bersama Dewan Asatidz',
                'summary' => 'Suasana khidmat santri dalam mengikuti kajian kitab fiqih dan akhlak mingguan.',
                'body' => '<p>Kegiatan pengajian kitab kuning merupakan ruh utama pendidikan pesantren. Seluruh santri mengikuti mudzakarah dan bandongan kitab secara rutin setiap bakda subuh dan maghrib untuk memperdalam pemahaman literatur keislaman klasik.</p>',
                'status' => 'published',
                'published_at' => now()->subDays(1),
            ]
        );

        // Post Status DRAFT (Untuk menguji bahwa publik TIDAK bisa melihatnya)
        Post::firstOrCreate(
            ['slug' => 'rencana-pembangunan-asrama-tahfidz-draft'],
            [
                'category_id' => $catBerita->id,
                'author_id' => $admin?->id,
                'title' => 'Draf Rencana Pembangunan Gedung Asrama Tahfidz Baru',
                'summary' => 'Artikel internal yang masih berupa draf dan belum boleh dibaca oleh publik.',
                'body' => '<p>Artikel ini berstatus DRAFT dan hanya boleh terlihat oleh editor/admin di panel CMS.</p>',
                'status' => 'draft',
                'published_at' => null,
            ]
        );

        // 3. Programs
        $programs = [
            [
                'name' => 'Program Tahfidzul Qur\'an',
                'slug' => 'program-tahfidzul-quran',
                'summary' => 'Bimbingan intensif hafalan Al-Qur\'an 30 juz dengan sanad muttashil, tajwid mumpuni, dan tartil.',
                'body' => '<p>Program Tahfidz ditujukan bagi santri yang berkeinginan menghafal Al-Qur\'an secara tuntas dengan mutqin. Dilengkapi dengan program muraja\'ah terpadu dan pembinaan akhlak qur\'ani.</p>',
                'status' => 'published',
                'sort_order' => 1,
            ],
            [
                'name' => 'Madrasah Diniyah Salafiyah',
                'slug' => 'madrasah-diniyah-salafiyah',
                'summary' => 'Kajian literatur kitab kuning klasik (turas) mencakup nahwu, shorof, fiqih, ushul fiqih, tafsir, dan hadits.',
                'body' => '<p>Pendidikan madrasah diniyah berjenjang dari Ula, Wustho, hingga Ulya untuk mencetak kader ulama dan da\'i yang mengakar pada tradisi keilmuan Ahlussunnah wal Jama\'ah.</p>',
                'status' => 'published',
                'sort_order' => 2,
            ],
            [
                'name' => 'Pendidikan Formal Terintegrasi',
                'slug' => 'pendidikan-formal-terintegrasi',
                'summary' => 'Kurikulum nasional Kementerian Agama yang memadukan keunggulan akademik, sains, dan nilai-nilai kepesantrenan.',
                'body' => '<p>Santri menempuh jenjang formal MTs / MA dengan kurikulum modern sehingga memiliki daya saing tinggi saat melanjutkan ke jenjang perguruan tinggi negeri maupun luar negeri.</p>',
                'status' => 'published',
                'sort_order' => 3,
            ],
        ];

        foreach ($programs as $prog) {
            Program::firstOrCreate(['slug' => $prog['slug']], $prog);
        }

        // 4. Staff Profiles (As placeholder)
        $staff = [
            [
                'name' => 'KH. [Nama Pengasuh Terkonfirmasi]',
                'position' => 'Pengasuh Pondok Pesantren',
                'description' => 'Pimpinan dan pengasuh utama Pondok Pesantren Damanhuri Romly.',
                'is_published' => true,
                'sort_order' => 1,
            ],
            [
                'name' => 'Ustadz [Nama Kepala Madin]',
                'position' => 'Kepala Madrasah Diniyah',
                'description' => 'Koordinator kurikulum pengajian kitab kuning dan pembinaan santri.',
                'is_published' => true,
                'sort_order' => 2,
            ],
            [
                'name' => 'Ustadz [Nama Ketua PSB]',
                'position' => 'Ketua Panitia PSB',
                'description' => 'Penanggung jawab penerimaan dan seleksi administrasi santri baru.',
                'is_published' => true,
                'sort_order' => 3,
            ],
        ];

        foreach ($staff as $item) {
            StaffProfile::firstOrCreate(['name' => $item['name']], $item);
        }

        // 5. Facilities
        $facilities = [
            [
                'name' => 'Masjid Jami\' Pesantren',
                'description' => 'Pusat ibadah shalat berjamaah, halaqah qur\'an, dan kajian akbar santri serta masyarakat sekitar.',
                'is_published' => true,
                'sort_order' => 1,
            ],
            [
                'name' => 'Gedung Asrama Santri',
                'description' => 'Asrama nyaman dengan ventilasi memadai, kamar bersih, dan pengawasan musyrif 24 jam.',
                'is_published' => true,
                'sort_order' => 2,
            ],
            [
                'name' => 'Perpustakaan & Maktabah Kitab',
                'description' => 'Koleksi ribuan judul kitab kuning klasik dan buku-buku referensi keilmuan Islam modern.',
                'is_published' => true,
                'sort_order' => 3,
            ],
            [
                'name' => 'Laboratorium Komputer & Bahasa',
                'description' => 'Fasilitas penunjang teknologi informasi dan pengembangan bahasa Arab serta Inggris.',
                'is_published' => true,
                'sort_order' => 4,
            ],
        ];

        foreach ($facilities as $fac) {
            Facility::firstOrCreate(['name' => $fac['name']], $fac);
        }

        // 6. Events
        Event::firstOrCreate(
            ['slug' => 'sosialisasi-psb-2026'],
            [
                'title' => 'Sosialisasi & Temu Daring Calon Wali Santri Baru',
                'description' => 'Pertemuan virtual untuk menjelaskan tata tertib pesantren, sistem pendidikan, dan panduan administrasi.',
                'start_at' => now()->addDays(14)->setTime(9, 0),
                'end_at' => now()->addDays(14)->setTime(11, 30),
                'location_text' => 'Zoom Meeting & Live YouTube Resmi Pesantren',
                'status' => 'published',
            ]
        );

        Event::firstOrCreate(
            ['slug' => 'peringatan-isra-miraj-1448'],
            [
                'title' => 'Peringatan Isra Mi\'raj & Doa Bersama Santri',
                'description' => 'Rangkaian muhasabah, pembacaan shalawat simtudduror, dan tausiyah keagamaan.',
                'start_at' => now()->addDays(25)->setTime(19, 30),
                'end_at' => now()->addDays(25)->setTime(22, 0),
                'location_text' => 'Masjid Jami\' Pondok Pesantren',
                'status' => 'published',
            ]
        );

        // 7. FAQs
        $faqs = [
            [
                'question' => 'Bagaimana alur pendaftaran santri baru secara online?',
                'answer' => 'Alur pendaftaran terdiri dari: 1) Membuat akun pendaftar, 2) Mengisi formulir data diri dan wali, 3) Mengunggah berkas scan (KK, Akta, Rapor/Ijazah, Pas Foto), 4) Memeriksa ringkasan dan klik Kirim Pengajuan, 5) Menunggu proses verifikasi petugas panitia.',
                'category' => 'PSB',
                'is_published' => true,
                'sort_order' => 1,
            ],
            [
                'question' => 'Apakah calon santri diperkenankan membawa gawai/telepon pintar?',
                'answer' => 'Demi menjaga konsentrasi belajar dan ketenangan ibadah, santri tidak diperkenankan membawa gawai pribadi. Komunikasi dengan wali santri difasilitasi melalui layanan telepon kantor asrama pada jadwal berkunjung yang ditentukan.',
                'category' => 'Kehidupan Santri',
                'is_published' => true,
                'sort_order' => 2,
            ],
            [
                'question' => 'Berapa batasan usia calon santri yang dapat mendaftar?',
                'answer' => 'Pesantren menerima santri lulusan SD/MI untuk jenjang Tsanawiyah, dan lulusan SMP/MTs untuk jenjang Aliyah. Ketentuan batas umur disesuaikan dengan syarat pendaftaran ujian kesetaraan Kementerian Agama.',
                'category' => 'PSB',
                'is_published' => true,
                'sort_order' => 3,
            ],
        ];

        foreach ($faqs as $faq) {
            Faq::firstOrCreate(['question' => $faq['question']], $faq);
        }

        // 8. Gallery
        Gallery::firstOrCreate(
            ['slug' => 'kegiatan-harian-santri'],
            [
                'title' => 'Aktivitas Keseharian Santri',
                'description' => 'Dokumentasi pembelajaran, halaqah Qur\'an, dan kebersamaan di lingkungan asrama.',
                'status' => 'published',
            ]
        );
    }
}
