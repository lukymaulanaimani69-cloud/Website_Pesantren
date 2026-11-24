<?php

use Illuminate\Support\Facades\Route;

// Controllers
use App\Http\Controllers\Public\HomeController;
use App\Http\Controllers\Public\ProfileController;
use App\Http\Controllers\Public\ProgramController as PublicProgramController;
use App\Http\Controllers\Public\PostController as PublicPostController;
use App\Http\Controllers\Public\EventController as PublicEventController;
use App\Http\Controllers\Public\GalleryController as PublicGalleryController;
use App\Http\Controllers\Public\FacilityController as PublicFacilityController;
use App\Http\Controllers\Public\FaqController as PublicFaqController;
use App\Http\Controllers\Public\ContactController;
use App\Http\Controllers\Public\PsbPublicController;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

use App\Http\Controllers\Applicant\ApplicantDashboardController;
use App\Http\Controllers\Applicant\ApplicantRegistrationController;

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\AuditLogController;
use App\Http\Controllers\Admin\EventController as AdminEventController;
use App\Http\Controllers\Admin\FacilityController as AdminFacilityController;
use App\Http\Controllers\Admin\FaqController as AdminFaqController;
use App\Http\Controllers\Admin\GalleryController as AdminGalleryController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\PageController as AdminPageController;
use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\Admin\ProgramController as AdminProgramController;
use App\Http\Controllers\Admin\PsbPeriodController;
use App\Http\Controllers\Admin\PsbReviewController;
use App\Http\Controllers\Admin\SiteSettingController;
use App\Http\Controllers\Admin\UserController;

// Public routes
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::prefix('profil')->name('profil.')->group(function () {
    Route::get('/sejarah', [ProfileController::class, 'sejarah'])->name('sejarah');
    Route::get('/visi-misi', [ProfileController::class, 'visiMisi'])->name('visi-misi');
    Route::get('/pengasuh', [ProfileController::class, 'pengasuh'])->name('pengasuh');
});

Route::get('/program', [PublicProgramController::class, 'index'])->name('program.index');
Route::get('/program/{slug}', [PublicProgramController::class, 'show'])->name('program.show');

Route::get('/berita', [PublicPostController::class, 'index'])->name('berita.index');
Route::get('/berita/{slug}', [PublicPostController::class, 'show'])->name('berita.show');

Route::get('/agenda', [PublicEventController::class, 'index'])->name('agenda.index');
Route::get('/agenda/{slug}', [PublicEventController::class, 'show'])->name('agenda.show');

Route::get('/galeri', [PublicGalleryController::class, 'index'])->name('galeri.index');
Route::get('/galeri/{slug}', [PublicGalleryController::class, 'show'])->name('galeri.show');

Route::get('/fasilitas', [PublicFacilityController::class, 'index'])->name('fasilitas.index');

Route::get('/faq', [PublicFaqController::class, 'index'])->name('faq.index');

Route::get('/kontak', [ContactController::class, 'show'])->name('kontak.index');
Route::post('/kontak/submit', [ContactController::class, 'submit'])->name('kontak.submit');

Route::get('/psb/info', [PsbPublicController::class, 'info'])->name('psb.info');

// Static pages (privacy policy, etc.)
Route::view('/kebijakan-privasi', 'public.privacy')->name('kebijakan-privasi');

// Authentication routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.post');

// Applicant routes (protected)
Route::middleware(['auth', 'role:applicant'])->group(function () {
    Route::get('/applicant/dashboard', [ApplicantDashboardController::class, 'index'])->name('applicant.dashboard');
    Route::post('/applicant/registration', [ApplicantRegistrationController::class, 'store'])->name('applicant.registration.store');
});

// Admin routes
Route::prefix('admin')->middleware(['auth', 'role:admin'])->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

    // Resource routes
    Route::resource('categories', CategoryController::class);
    Route::resource('audit-logs', AuditLogController::class)->only(['index', 'show']);
    Route::resource('events', AdminEventController::class);
    Route::resource('facilities', AdminFacilityController::class);
    Route::resource('faqs', AdminFaqController::class);
    Route::resource('galleries', AdminGalleryController::class);
    Route::resource('messages', MessageController::class);
    Route::resource('pages', AdminPageController::class);
    Route::resource('posts', AdminPostController::class);
    Route::resource('programs', AdminProgramController::class);
    Route::resource('users', UserController::class);

    // PSB admin routes
    Route::resource('psb-periods', PsbPeriodController::class)->names('psb.periods');
    Route::resource('psb-reviews', PsbReviewController::class)->names('psb');
    Route::post('psb/{registration}/status', [PsbReviewController::class, 'updateStatus'])->name('psb.update-status');

    // Settings
    Route::get('/settings', [SiteSettingController::class, 'index'])->name('settings.index');
    Route::get('/settings/edit', [SiteSettingController::class, 'index'])->name('settings.edit');
    Route::post('/settings', [SiteSettingController::class, 'update'])->name('settings.update');
    Route::put('/settings', [SiteSettingController::class, 'update'])->name('settings.put');
});