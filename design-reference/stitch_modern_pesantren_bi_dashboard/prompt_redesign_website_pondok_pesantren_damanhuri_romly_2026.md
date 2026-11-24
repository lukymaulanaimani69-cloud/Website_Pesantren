# MASTER PROMPT ANTIGRAVITY
## Redesign Website Pondok Pesantren Damanhuri Romly — Modern Islamic Heritage 2026

> Gunakan prompt ini pada Google Antigravity setelah membuka folder proyek Laravel yang sedang digunakan. Lampirkan screenshot website referensi apabila diperlukan.

---

## PERAN

Bertindaklah sebagai Senior Full-Stack Laravel Developer, UI/UX Designer, Software Architect, dan Web Security Engineer.

Saya sedang mengembangkan website resmi **Pondok Pesantren Damanhuri Romly** menggunakan:

- Backend: Laravel (ikuti versi yang sudah terpasang pada proyek).
- Frontend: Blade dan Vite (pertahankan stack yang sudah digunakan).
- Database: MySQL.
- Authentication: autentikasi pengguna dan pembatasan hak akses berdasarkan peran.
- File storage: Laravel Filesystem.
- Security: Laravel Middleware, Policies, Form Request validation, query scoping, dan audit log jika diperlukan.

Tugas utama adalah memperbarui dan membangun tampilan website publik agar lebih modern, profesional, elegan, responsif, dan sesuai karakter lembaga pendidikan Islam pada tahun 2026.

## 0. ATURAN WAJIB SEBELUM MULAI

1. Audit struktur proyek terlebih dahulu: versi Laravel/PHP, dependensi, routing, controller, model, migration, Blade, CSS, JavaScript, Vite, autentikasi, dan database.
2. Jangan langsung mengubah atau menghapus kode yang sudah berjalan.
3. Jangan mengganti framework, versi Laravel, sistem autentikasi, atau struktur database tanpa alasan teknis yang jelas dan persetujuan.
4. Pertahankan seluruh fitur dan alur bisnis yang sudah berfungsi.
5. Gunakan komponen/layout yang konsisten dan reusable.
6. Jangan membuat data sejarah, nama pengasuh, alamat, jadwal pendidikan, nomor kontak, prestasi, atau informasi resmi pesantren secara fiktif. Gunakan data yang tersedia. Jika belum tersedia, tampilkan placeholder yang jelas dan mudah diubah melalui CMS.
7. Jangan menampilkan data pribadi santri, wali santri, atau pendaftar kepada pengunjung publik.
8. Jangan menganggap fitur formulir reservasi Sambang Santri sudah menjadi SOP. Implementasikan halaman informasi terlebih dahulu; formulir pengajuan kunjungan dibuat opsional dan dapat diaktifkan setelah kebijakan pesantren dikonfirmasi.
9. Setiap perubahan harus diuji. Jangan menyatakan selesai jika route, halaman, validasi, responsivitas, atau hak akses belum diperiksa.
10. Kerjakan bertahap. Setelah audit, sampaikan ringkasan kondisi proyek, rencana file yang akan diubah, risiko, dan urutan implementasi sebelum perubahan besar.

---

# 1. ARAH DESAIN DAN IDENTITAS VISUAL

Gunakan konsep:

**MODERN ISLAMIC HERITAGE — Contemporary Pesantren Website 2026**

Karakter desain:
- Elegan, modern, bersih, hangat, islami, dan profesional.
- Menggambarkan pendidikan, tradisi pesantren, keilmuan, akhlak, dan kebersamaan.
- Memprioritaskan foto asli lingkungan, kegiatan, fasilitas, pengasuh, dan santri yang memang dimiliki pesantren.
- Tidak terlihat seperti template sekolah generik.
- Tidak terlalu ramai, tidak terlalu banyak animasi, dan tidak menggunakan efek berlebihan.

### Palet warna rekomendasi

- Deep Green: `#153D32` — warna identitas utama.
- Ivory: `#F7F4EC` — latar hangat.
- Antique Gold: `#C5A15B` — aksen dan highlight.
- Terracotta: `#A95135` — aksen sekunder, digunakan seperlunya.
- Charcoal: `#252B29` — teks utama.
- White: `#FFFFFF` — permukaan kartu dan area konten.

Jadikan palet ini sebagai rekomendasi awal. Jika logo atau identitas resmi pesantren memiliki warna yang berbeda, prioritaskan warna resmi tersebut dan sesuaikan palet agar tetap harmonis.

### Tipografi

- Gunakan tipografi sans-serif modern yang mudah dibaca untuk konten.
- Gunakan serif secara terbatas untuk judul editorial jika cocok.
- Pastikan ukuran, ketebalan, dan jarak antarbaris nyaman di desktop maupun ponsel.
- Tulisan Arab harus menggunakan font yang mendukung karakter Arab dengan baik.
- Jangan menggunakan terlalu banyak jenis font.

### Elemen visual

- Pola geometris islami digunakan sangat halus pada area tertentu.
- Sudut kartu tidak harus semuanya membulat besar; gunakan radius secara konsisten.
- Gunakan bayangan tipis dan border halus.
- Gunakan ikon yang konsisten.
- Hindari gradient berlebihan, glassmorphism berlebihan, efek neon, dan animasi yang mengganggu.
- Gunakan foto asli pesantren. Jangan mengambil foto lembaga lain seolah-olah merupakan foto Pondok Pesantren Damanhuri Romly.

---

# 2. HEADER DAN NAVIGASI

Buat header modern dengan dua tingkat.

### A. Top information bar

Berisi:
- Informasi kontak resmi jika tersedia.
- Tautan media sosial resmi jika tersedia.
- Tombol pencarian.
- Informasi singkat pesantren atau alamat ringkas jika tersedia.

Jangan menampilkan ikon sosial media yang tidak memiliki URL tujuan.

### B. Main header

Berisi:
- Logo resmi pesantren di sisi kiri.
- Nama lengkap Pondok Pesantren Damanhuri Romly.
- Deskripsi singkat/tagline jika datanya tersedia.
- Tombol menu mobile pada layar kecil.

### C. Main navigation

Gunakan navigasi horizontal pada desktop dengan dropdown yang rapi.

Struktur menu:

1. **Beranda**
2. **Profil**
   - Tentang Pesantren
   - Sejarah
   - Visi dan Misi
   - Pengasuh
   - Struktur Organisasi
3. **Pendidikan**
   - Program Pendidikan
   - Kurikulum
   - Fasilitas
4. **Kegiatan**
   - Kegiatan Harian
   - Agenda
   - Ekstrakurikuler
5. **Waq'iyah**
   - Informasi Waq'iyah
6. **Informasi**
   - Berita
   - Pengumuman
7. **Galeri**
   - Galeri Foto
   - Galeri Video
8. **Sambang Santri**
   - Informasi Sambang
   - Jadwal Kunjungan
   - Tata Tertib
   - Prosedur Kunjungan
   - Kontak Pengelola
9. **PSB**
   - Informasi Penerimaan Santri Baru
   - Persyaratan
   - Alur Pendaftaran
   - Pendaftaran Online
10. **Lainnya**
    - Kontak
    - FAQ

Catatan:
- Menu Sejarah ditempatkan sebagai submenu Profil agar struktur informasi tetap logis.
- Sambang Santri harus mudah ditemukan. Pada desktop boleh ditampilkan sebagai menu utama atau menu layanan yang menonjol.
- PSB dapat menggunakan tombol aksen khusus, tetapi jangan sampai mengalahkan identitas utama.
- Menu Waq'iyah harus mempertahankan istilah lembaga. Jangan menebak atau mengubah maknanya.
- Jika konten suatu submenu belum tersedia, jangan membuat halaman kosong yang seolah-olah sudah selesai. Siapkan status draft atau placeholder CMS.

### Perilaku navigasi

- Sticky navigation ketika halaman digulir, tanpa menutupi konten.
- Dropdown dapat digunakan dengan mouse, keyboard, dan sentuhan.
- Beri indikator menu aktif.
- Mobile menggunakan drawer atau menu panel yang mudah digunakan.
- Tutup menu mobile setelah pengguna memilih tautan.
- Pastikan tidak ada menu yang terpotong pada tablet.

---

# 3. BERANDA / HOMEPAGE

Bangun homepage dengan urutan berikut.

### Section 1 — Hero utama

Buat hero editorial yang kuat, bukan sekadar banner gambar biasa.

Komposisi:
- Label kecil: identitas atau kategori pesantren.
- Headline utama yang singkat dan bermakna.
- Deskripsi singkat tentang pesantren.
- CTA utama: **Kenali Pesantren**.
- CTA sekunder: **Penerimaan Santri Baru**, jika periode PSB tersedia.
- Foto utama lingkungan atau aktivitas pesantren.
- Elemen dekoratif islami yang sangat halus.

Gunakan foto besar berkualitas baik dengan rasio yang sesuai. Jika tersedia foto asli, gunakan foto tersebut. Jika belum ada, gunakan placeholder lokal yang jelas untuk diganti, bukan mengklaim foto stok sebagai foto pesantren.

### Section 2 — Sambutan / pengenalan pesantren

- Foto pengasuh atau perwakilan lembaga jika tersedia.
- Judul sambutan.
- Kutipan atau pengantar singkat.
- Tombol menuju halaman profil lengkap.

Jangan membuat kutipan atas nama pengasuh tanpa sumber resmi.

### Section 3 — Profil singkat dan nilai utama

Tampilkan ringkasan pesantren, visi, misi, atau nilai pendidikan yang benar-benar tersedia.

Gunakan maksimal 3–4 kartu agar tidak padat.

### Section 4 — Program pendidikan

Tampilkan program pendidikan yang sudah dikonfirmasi oleh pihak pesantren.
Setiap kartu memiliki:
- Ikon/foto.
- Nama program.
- Deskripsi singkat.
- Tautan detail.

Jangan mengarang nama program atau jenjang.

### Section 5 — Kegiatan pesantren

Tampilkan foto kegiatan dan ringkasan aktivitas.
Gunakan layout editorial/masonry yang tetap rapi dan responsif.

### Section 6 — Berita dan pengumuman

- Berita terbaru.
- Pengumuman penting.
- Tanggal publikasi.
- Kategori.
- Gambar thumbnail.
- Tautan baca selengkapnya.

### Section 7 — Sejarah singkat

Tampilkan beberapa tonggak sejarah pesantren dalam bentuk timeline horizontal di desktop dan vertikal di ponsel.
Sediakan tautan **Baca Sejarah Lengkap**.

### Section 8 — Sambang Santri

Buat section layanan yang mudah ditemukan:
- Ringkasan informasi kunjungan.
- Jadwal sambang yang telah disahkan.
- Tombol **Lihat Informasi Sambang**.
- Tombol kontak pengelola jika tersedia.

### Section 9 — Galeri

Tampilkan foto pilihan dari galeri yang dipublikasikan admin.

### Section 10 — CTA PSB

Jika periode pendaftaran aktif:
- Tampilkan informasi periode.
- Persyaratan ringkas.
- Tombol daftar.

Jika belum aktif, tampilkan informasi bahwa pendaftaran belum dibuka hanya apabila status tersebut sudah ditentukan admin.

### Section 11 — Footer

Berisi:
- Logo dan nama pesantren.
- Deskripsi singkat.
- Navigasi cepat.
- Kontak resmi.
- Alamat.
- Media sosial.
- Copyright dinamis.

---

# 4. HALAMAN FITUR UTAMA

## A. Halaman Sejarah

Route yang disarankan: `/profil/sejarah`

Tujuan:
Menyampaikan perjalanan dan perkembangan Pondok Pesantren Damanhuri Romly secara informatif dan menarik.

UI:
- Breadcrumb.
- Hero halaman dengan foto dokumentasi.
- Judul "Sejarah Pondok Pesantren Damanhuri Romly".
- Pengantar sejarah.
- Timeline perjalanan pesantren.
- Foto arsip/dokumentasi.
- Tokoh pendiri atau pengasuh jika informasi resmi tersedia.
- Perkembangan lembaga.
- CTA menuju profil dan kontak.

Fitur admin:
- Tambah, ubah, hapus, dan urutkan tonggak sejarah.
- Tahun/tanggal peristiwa.
- Judul peristiwa.
- Deskripsi.
- Foto dokumentasi.
- Status draft/published.
- Urutan timeline.
- Validasi konten sebelum publikasi.

Jangan mengisi tahun berdiri, nama pendiri, atau peristiwa sejarah secara fiktif.

## B. Halaman Sambang Santri

Route yang disarankan: `/sambang-santri`

Tujuan:
Menjadi pusat informasi resmi bagi wali santri/keluarga yang ingin melakukan kunjungan.

UI:
- Hero "Informasi Sambang Santri".
- Penjelasan singkat layanan.
- Jadwal kunjungan.
- Tata tertib sambang.
- Prosedur kunjungan.
- Ketentuan barang bawaan jika ada aturan resmi.
- Lokasi dan petunjuk menuju pesantren.
- Kontak pengelola.
- FAQ sambang.
- Pengumuman perubahan jadwal.

Fitur admin:
- Mengelola jadwal sambang.
- Mengelola tata tertib.
- Mengelola prosedur.
- Mengelola pengumuman.
- Mengelola FAQ.
- Mengaktifkan/menonaktifkan informasi sambang.
- Mencatat perubahan jadwal dan pembaruan informasi.

### Pengajuan kunjungan — opsional

Jangan aktifkan sebelum pihak pesantren mengonfirmasi bahwa sistem pengajuan kunjungan memang diperlukan.

Jika disetujui, sediakan:
- Nama pengunjung.
- Nomor WhatsApp.
- Hubungan dengan santri.
- Identitas santri yang dikunjungi.
- Tanggal yang diminta.
- Jumlah pengunjung.
- Catatan tambahan seperlunya.

Status:
- Menunggu.
- Disetujui.
- Ditolak.
- Dibatalkan.

Aturan keamanan:
- Data pengajuan hanya bisa dibaca oleh pengelola yang berwenang.
- Pengunjung hanya dapat melihat status pengajuannya melalui mekanisme verifikasi yang aman.
- Jangan membuat daftar pengunjung atau nama santri dapat diakses publik.
- Validasi input dan terapkan rate limiting.
- Simpan data seminimal mungkin dan tentukan masa retensi bersama pihak pesantren.

---

# 5. HALAMAN PUBLIK LAINNYA

Buat template desain konsisten untuk:

- Profil pesantren.
- Visi dan misi.
- Pengasuh.
- Struktur organisasi.
- Pendidikan.
- Kegiatan.
- Waq'iyah.
- Informasi/berita.
- Detail berita.
- Galeri foto.
- Detail galeri.
- Galeri video.
- Informasi PSB.
- Persyaratan PSB.
- Alur pendaftaran.
- Formulir PSB jika modul pendaftaran sudah tersedia.
- Kontak.
- FAQ.
- Pencarian.

Setiap halaman memiliki:
- Breadcrumb.
- Judul dan deskripsi.
- Konten dengan lebar baca yang nyaman.
- Gambar yang proporsional.
- Navigasi lanjutan bila diperlukan.
- Empty state yang informatif.
- Tampilan responsif.

---

# 6. CMS / DASHBOARD ADMIN

Buat dashboard admin yang modern dan berbeda dari tampilan publik, tetapi tetap menggunakan identitas visual yang sama.

### Ringkasan dashboard

Tampilkan kartu statistik yang sesuai data nyata:
- Jumlah berita.
- Jumlah galeri.
- Jumlah halaman publikasi.
- Jumlah pendaftar PSB jika modul aktif.
- Jumlah pengajuan sambang jika modul aktif.

Jangan membuat angka statistik dummy pada dashboard produksi.

### Modul CMS

- Pengelolaan profil pesantren.
- Pengelolaan sejarah.
- Pengelolaan visi dan misi.
- Pengelolaan program pendidikan.
- Pengelolaan kegiatan.
- Pengelolaan Waq'iyah.
- Pengelolaan berita dan pengumuman.
- Pengelolaan galeri foto/video.
- Pengelolaan informasi Sambang Santri.
- Pengelolaan kontak dan media sosial.
- Pengelolaan menu navigasi.
- Pengaturan identitas website.

Setiap modul mendukung CRUD sesuai kebutuhan, validasi, status draft/published, dan konfirmasi sebelum penghapusan.

### Media manager

- Upload gambar.
- Validasi tipe file dan ukuran.
- Preview gambar.
- Optimasi ukuran gambar jika memungkinkan.
- Nama file aman dan unik.
- Penghapusan file yang tidak digunakan dengan pemeriksaan referensi.
- Bedakan file publik dan dokumen privat.

---

# 7. AUTENTIKASI DAN OTORISASI

Audit autentikasi yang sudah ada terlebih dahulu.

Usulan peran:
1. **Super Admin** — mengelola seluruh sistem dan akun.
2. **Admin Konten** — mengelola halaman, sejarah, berita, kegiatan, galeri, dan informasi publik.
3. **Admin PSB** — mengelola pendaftaran dan dokumen PSB jika modul aktif.
4. **Admin Sambang** — mengelola jadwal, aturan, pengumuman, dan pengajuan sambang jika modul aktif.

Pengunjung publik tidak perlu login untuk membaca halaman publik.

Gunakan:
- Middleware untuk pemeriksaan akses route.
- Laravel Policies/Gates untuk otorisasi tindakan.
- Form Request untuk validasi.
- Password hashing Laravel.
- CSRF protection.
- Session regeneration setelah login.
- Rate limiting login.
- Validasi upload file.
- Audit log untuk tindakan administratif penting.

Jangan hanya menyembunyikan tombol di frontend. Semua akses harus divalidasi di backend.

---

# 8. DATABASE OVERVIEW

Audit database saat ini dan gunakan tabel yang sudah tersedia jika fungsinya sesuai.

Usulan entitas yang dapat dipertimbangkan:

### Sistem pengguna
- users
- roles / permissions (atau struktur peran yang sudah ada)
- audit_logs

### CMS
- pages
- navigation_items
- posts
- post_categories
- galleries
- gallery_items
- media
- history_milestones
- education_programs
- activities
- announcements
- site_settings
- contact_settings

### PSB (jika masuk scope)
- admission_periods
- student_applications
- application_documents
- application_status_histories

### Sambang Santri
- sambang_settings
- sambang_schedules
- sambang_rules
- sambang_announcements
- sambang_faqs
- sambang_requests (opsional, hanya jika pengajuan kunjungan disetujui)

Prinsip database:
- Primary key dan foreign key yang jelas.
- Index untuk kolom pencarian dan relasi.
- Unique slug untuk halaman/artikel yang relevan.
- created_at dan updated_at.
- Soft deletes jika memang diperlukan.
- Status publikasi yang konsisten.
- Jangan menyimpan data yang tidak diperlukan.
- Migration harus dapat dijalankan dan diuji.

Jangan membuat semua tabel sekaligus sebelum memeriksa struktur database dan kebutuhan fitur yang benar-benar disetujui.

---

# 9. KEAMANAN DATA DAN PEMBATASAN AKSES (RLS)

**Penting:** MySQL tidak menyediakan Row-Level Security bawaan seperti PostgreSQL. Jangan mengklaim bahwa RLS native MySQL sudah aktif.

Terapkan pola pembatasan akses tingkat aplikasi yang setara dengan prinsip least privilege:

1. Laravel Policies/Gates untuk memeriksa siapa boleh melihat, membuat, mengubah, dan menghapus data.
2. Eloquent query scopes untuk membatasi baris data sesuai peran atau kepemilikan.
3. Middleware untuk membatasi akses modul.
4. Validasi ownership pada setiap operasi detail/update/delete.
5. Query data privat harus dilakukan melalui backend yang sudah memeriksa otorisasi.
6. Dokumen pendaftar dan data pengajuan sambang disimpan pada private storage.
7. Unduh dokumen privat hanya melalui route terproteksi.
8. Jangan mengekspos ID, nomor telepon, dokumen, atau identitas santri melalui endpoint publik.
9. Catat tindakan penting di audit log.
10. Uji akses negatif: akun tanpa izin harus menerima 403 atau respons aman yang sesuai.

Jika kelak proyek membutuhkan isolasi database yang lebih ketat, evaluasi penggunaan PostgreSQL RLS sebagai keputusan arsitektur terpisah. Jangan mengganti MySQL secara otomatis.

---

# 10. RESPONSIVE DESIGN DAN AKSESIBILITAS

Target perangkat:
- Desktop.
- Laptop.
- Tablet.
- Smartphone Android/iOS.

Ketentuan:
- Mobile-first.
- Tidak ada horizontal overflow.
- Menu mudah digunakan dengan sentuhan.
- Ukuran tombol nyaman.
- Form mudah diisi.
- Kontras teks memadai.
- Focus state terlihat.
- Alt text gambar.
- Struktur heading semantik.
- Animasi menghormati prefers-reduced-motion.
- Gambar responsif dan lazy loading.
- Tidak mengandalkan hover saja.
- Hindari teks terlalu kecil.

Periksa minimal lebar layar:
- 360 px.
- 390 px.
- 768 px.
- 1024 px.
- 1366 px.
- 1440 px.

---

# 11. ANIMASI DAN MICRO-INTERACTION

Gunakan animasi secara terbatas:
- Transisi dropdown.
- Hover kartu.
- Reveal ringan saat scroll.
- Transisi carousel yang halus.
- Feedback tombol.
- Loading state.
- Toast notifikasi.
- Skeleton loading bila sesuai.

Jangan:
- Menggunakan animasi berulang yang mengganggu.
- Membuat intro panjang sebelum konten terlihat.
- Menambahkan efek parallax berat.
- Membuat teks bergerak terus-menerus.
- Mengorbankan performa demi animasi.

Pastikan interaksi tetap berfungsi tanpa JavaScript yang tidak diperlukan.

---

# 12. TECHNICAL REQUIREMENTS

- Pertahankan Laravel dan Vite yang telah ada.
- Gunakan Blade components/layouts yang reusable.
- Gunakan route name yang konsisten.
- Gunakan controller yang terstruktur.
- Gunakan Form Request untuk validasi kompleks.
- Gunakan Policies/Gates untuk otorisasi.
- Gunakan Eloquent ORM dan query yang efisien.
- Gunakan pagination pada daftar konten.
- Gunakan Laravel Filesystem.
- Simpan rahasia di `.env`, jangan pernah commit kredensial.
- Gunakan database MySQL yang sudah dikonfigurasi.
- Jangan menambahkan dependency besar tanpa kebutuhan.
- Jangan mengubah konfigurasi server atau deployment tanpa persetujuan.

Optimasi:
- Optimasi gambar.
- Lazy loading.
- Hindari N+1 query.
- Cache hanya data yang aman dan tepat.
- Minifikasi/build aset melalui Vite.
- Gunakan pagination dan eager loading.

SEO dasar:
- Title dan meta description per halaman.
- Open Graph.
- Canonical URL bila relevan.
- Sitemap.
- Robots.txt.
- URL slug yang mudah dibaca.
- Structured data hanya jika informasinya benar dan tersedia.

---

# 13. SCOPE DAN PRIORITAS IMPLEMENTASI

Kerjakan secara bertahap.

### Fase 0 — Audit
- Audit proyek dan database.
- Identifikasi fitur yang sudah ada.
- Catat file yang akan diubah.
- Buat rencana dan risiko.
- Jangan mengubah kode sebelum hasil audit disampaikan.

### Fase 1 — Design system dan layout
- Warna, font, spacing, komponen.
- Header.
- Navigasi.
- Footer.
- Layout desktop dan mobile.

### Fase 2 — Homepage
- Hero.
- Profil singkat.
- Pendidikan.
- Kegiatan.
- Berita.
- Sejarah singkat.
- Sambang Santri.
- Galeri.
- CTA PSB.

### Fase 3 — Halaman informasi
- Profil.
- Sejarah.
- Pendidikan.
- Kegiatan.
- Waq'iyah.
- Informasi.
- Galeri.
- Sambang Santri.
- PSB.
- Kontak dan FAQ.

### Fase 4 — CMS
- CRUD konten.
- Media manager.
- Menu manager.
- Pengaturan website.
- Status draft/published.

### Fase 5 — Autentikasi dan keamanan
- Role.
- Middleware.
- Policies.
- Query scoping.
- Private storage.
- Audit log.
- Uji akses.

### Fase 6 — PSB dan Sambang
- Audit modul yang sudah ada.
- Integrasikan PSB jika sudah menjadi scope.
- Bangun informasi Sambang Santri.
- Form pengajuan sambang hanya jika telah disetujui.

### Fase 7 — Testing dan finalisasi
- Test route.
- Test CRUD.
- Test validasi.
- Test otorisasi.
- Test upload.
- Test responsivitas.
- Test build Vite.
- Test tampilan desktop dan mobile.
- Perbaiki error console dan log.
- Dokumentasikan perubahan.

---

# 14. KRITERIA PENERIMAAN

Pekerjaan dinyatakan selesai jika:

1. Tampilan website konsisten dengan konsep Modern Islamic Heritage 2026.
2. Logo dan identitas resmi pesantren digunakan dengan benar.
3. Semua menu dan submenu menuju halaman yang benar.
4. Menu Sejarah tersedia dan kontennya dapat dikelola admin.
5. Menu Sambang Santri tersedia dan informasi dapat dikelola admin.
6. Tidak ada tautan atau tombol utama yang mati.
7. Homepage dan halaman dalam responsif.
8. Tidak ada horizontal overflow pada perangkat sasaran.
9. CMS hanya dapat digunakan oleh akun yang berwenang.
10. Data privat tidak dapat diakses oleh pengunjung tanpa izin.
11. Validasi form dan upload berjalan.
12. Data yang belum tersedia tidak diganti dengan informasi fiktif.
13. Build Vite berhasil.
14. Test yang relevan berhasil.
15. Fitur lama yang sudah berjalan tidak rusak.

---

# 15. FORMAT LAPORAN SETIAP FASE

Setelah menyelesaikan setiap fase, laporkan:

- Fase yang selesai.
- Fitur yang berhasil dibuat.
- File yang ditambahkan.
- File yang diubah.
- Migration yang dibuat/dijalankan.
- Route yang ditambahkan/diubah.
- Hasil pengujian.
- Error yang ditemukan dan penyelesaiannya.
- Hal yang masih membutuhkan data atau keputusan pemilik pesantren.
- Fase berikutnya.

## INSTRUKSI MULAI

Sekarang mulai dari **FASE 0 — AUDIT PROYEK**.

Jangan langsung melakukan redesign atau mengubah database. Periksa proyek Laravel yang sedang terbuka, lalu berikan laporan kondisi awal dan rencana implementasi yang aman. Setelah itu, kerjakan sesuai fase secara bertahap dengan menjaga semua fitur yang sudah berjalan.
