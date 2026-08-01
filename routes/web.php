<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Pengguna\ProfileController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboard;
use App\Http\Controllers\Pengguna\DashboardController as PenggunaDashboard;
use App\Http\Controllers\Pengguna\KeuanganController;
use App\Http\Controllers\Pengguna\CategoryController;
use App\Http\Controllers\Pengguna\RiwayatController;
use App\Http\Controllers\Pengguna\LaporanController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Pengguna\AiController;
use App\Http\Controllers\KebijakanController;
use App\Http\Controllers\LeaderboardController; 
use App\Http\Controllers\Pengguna\BlogController;

// Kebijakan & Privasi
Route::get('/kebijakan-privasi', [KebijakanController::class, 'index'])->name('kebijakan.index');

// AI
Route::get('/pengguna/ai', [AiController::class, 'index'])->name('pengguna.ai.index');
Route::post('/ai-nexfi', [AiController::class, 'chat'])
    ->middleware('throttle:10,1')
    ->name('ai.nexfi');

// Testimonial — hanya user yang sudah login
Route::post('/testimonial/submit', [\App\Http\Controllers\TestimonialSubmitController::class, 'store'])
    ->name('testimonial.store')
    ->middleware('auth');

// Kontak — hanya user yang sudah login
Route::post('/kontak', [ContactController::class, 'store'])
    ->name('kontak.store')
    ->middleware('auth');

// Public Profile
Route::get('/user/{username}', [ProfileController::class, 'show'])->name('profile.public');

// ── Leaderboard Publik ── (baru)
Route::get('/leaderboard', [LeaderboardController::class, 'index'])->name('leaderboard');


/*
|--------------------------------------------------------------------------
| ADMIN ROUTES
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/dashboard', [AdminDashboard::class, 'index'])->name('dashboard');

        // Testimonial
        Route::get('/testimoni', [TestimonialController::class, 'index'])->name('testimoni.index');
        Route::patch('/testimoni/{testimonial}/publish', [TestimonialController::class, 'publish'])->name('testimoni.publish');
        Route::patch('/testimoni/{testimonial}/reject', [TestimonialController::class, 'reject'])->name('testimoni.reject');
        Route::delete('/testimoni/{testimonial}', [TestimonialController::class, 'destroy'])->name('testimoni.destroy');

        // Messages
        Route::get('messages', [MessageController::class, 'index'])->name('messages.index');
        Route::get('messages/{message}/reply', [MessageController::class, 'replyForm'])->name('messages.replyForm');
        Route::post('messages/{message}/send', [MessageController::class, 'sendReply'])->name('messages.sendReply');
        Route::get('messages/{message}', [MessageController::class, 'show'])->name('messages.show');
        Route::delete('messages/{message}', [MessageController::class, 'destroy'])->name('messages.destroy');

    });

/*
|--------------------------------------------------------------------------
| HALAMAN AWAL
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    if (auth()->check()) {
        return auth()->user()->role === 'admin'
            ? redirect()->route('admin.dashboard')
            : redirect()->route('pengguna.dashboard');
    }
    return view('welcome');
});

Route::get('/preview-landing', function () {
    return view('welcome');
})->name('preview.landing')->middleware('auth');

/*
|--------------------------------------------------------------------------
| SMART DASHBOARD REDIRECT
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->get('/dashboard', function () {
    return auth()->user()->role === 'admin'
        ? redirect()->route('admin.dashboard')
        : redirect()->route('pengguna.dashboard');
})->name('dashboard');

/*
|--------------------------------------------------------------------------
| PENGGUNA ROUTES
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:pengguna'])
    ->prefix('pengguna')
    ->name('pengguna.')
    ->group(function () {

        // Dashboard
        Route::get('/dashboard', [PenggunaDashboard::class, 'index'])->name('dashboard');

        // Keuangan
        Route::get('/keuangan', [KeuanganController::class, 'index'])->name('keuangan.index');
        Route::post('/keuangan', [KeuanganController::class, 'store'])->name('keuangan.store');
        Route::post('/keuangan/saldo', [KeuanganController::class, 'updateSaldo'])->name('keuangan.saldo');
        Route::get('/keuangan/{id}/edit', [KeuanganController::class, 'edit'])->name('keuangan.edit');
        Route::put('/keuangan/{id}', [KeuanganController::class, 'update'])->name('keuangan.update');

        // Riwayat
        Route::get('/riwayat', [RiwayatController::class, 'index'])->name('riwayat.index');
        Route::delete('/riwayat/{id}', [RiwayatController::class, 'destroy'])->name('riwayat.destroy');

        // Kategori
        Route::get('/kategori', [CategoryController::class, 'index'])->name('kategori.index');
        Route::post('/kategori', [CategoryController::class, 'store'])->name('kategori.store');
        Route::put('/kategori/{id}', [CategoryController::class, 'update'])->name('kategori.update');
        Route::delete('/kategori/{id}', [CategoryController::class, 'destroy'])->name('kategori.destroy');

        // Laporan
        Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');
        Route::get('/laporan/pdf', [LaporanController::class, 'exportPdf'])->name('laporan.pdf');
        Route::get('/laporan/excel', [LaporanController::class, 'exportExcel'])->name('laporan.excel');

        // Profile
        Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
        Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');

        // Blog 
        // Blog GrowFin
        Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
        Route::get('/blog/visit/{slug}', [BlogController::class, 'visit'])->name('blog.visit');
        });

require __DIR__.'/auth.php';