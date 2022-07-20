<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NilaiGuruController;
use App\Http\Controllers\ForumSiswaController;
use App\Http\Controllers\UjianSiswaController;
use App\Http\Controllers\Guru\SoalGuruController;
use App\Http\Controllers\Guru\KelasGuruController;
use App\Http\Controllers\Guru\UjianGuruController;
use App\Http\Controllers\Guru\Auth\GuruAuthController;
use App\Http\Controllers\Guru\DashboardGuruController;
use App\Http\Controllers\Guru\KelasMapelGuruController;
use App\Http\Controllers\Guru\KelasUjianGuruController;
use App\Http\Controllers\Admin\Auth\AdminAuthController;
use App\Http\Controllers\Admin\DashboardAdminController;
use App\Http\Controllers\Guru\MateriGuruController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('pages.home');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

// User Routes
Route::middleware(['auth'])->group(function () {
    // Ujian 
    Route::get('ujian', [UjianSiswaController::class, 'index'])->name('ujian.index');
    Route::get('ujian/{id}/show', [UjianSiswaController::class, 'show'])->name('ujian.show');
    Route::get('ujian/{id}', [UjianSiswaController::class, 'start'])->name('ujian.start');
    Route::post('ujian/{id}/result', [UjianSiswaController::class, 'result'])->name('ujian.result');
    Route::get('ujian/{id}/info', [UjianSiswaController::class, 'info'])->name('ujian.info');
    Route::get('ujian/{id}/detail', [UjianSiswaController::class, 'detail'])->name('ujian.detail');

    // Forum
    Route::get('forum', [ForumSiswaController::class, 'index'])->name('forum.index');
    Route::get('forum/create', [ForumSiswaController::class, 'create'])->name('forum.create');
    Route::post('forum', [ForumSiswaController::class, 'store'])->name('forum.store');
    Route::get('forum/{id}/view', [ForumSiswaController::class, 'view'])->name('forum.view');
    Route::post('forum/{id}/view', [ForumSiswaController::class, 'post'])->name('forum.post');
});

// Admin Routes
Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function () {
    Route::namespace('Auth')->middleware('guest:admin')->group(function () {
        // login route
        Route::get('login', [AdminAuthController::class, 'create'])->name('login');
        Route::post('login', [AdminAuthController::class, 'store'])->name('adminlogin');
    });
    
    Route::middleware('admin')->group(function () {
        Route::get('dashboard', [DashboardAdminController::class, 'index'])->name('dashboard');
    });
    
    Route::post('logout', [AdminAuthController::class, 'destroy'])->name('logout');
});

// Guru Routes
Route::namespace('Guru')->prefix('guru')->name('guru.')->group(function () {
    Route::namespace('Auth')->middleware('guest:guru')->group(function () {
        // login route
        Route::get('login', [GuruAuthController::class, 'create'])->name('login');
        Route::post('login', [GuruAuthController::class, 'store'])->name('gurulogin');
    }); 

    Route::middleware('guru')->group(function () {
        // Dashboard
        Route::get('dashboard', [DashboardGuruController::class, 'index'])->name('dashboard');

        // Mata pelajaran
        Route::get('mata-pelajaran', [KelasMapelGuruController::class, 'index'])->name('mata-pelajaran');
        Route::get('mata-pelajaran/create', [KelasMapelGuruController::class, 'create'])->name('mata-pelajaran.create');
        Route::post('mata-pelajaran', [KelasMapelGuruController::class, 'store'])->name('mata-pelajaran.store');
        Route::get('mata-pelajaran/{kelas_mapel_id}/edit', [KelasMapelGuruController::class, 'edit'])->name('mata-pelajaran.edit');
        Route::put('mata-pelajaran/{kelas_mapel_id}', [KelasMapelGuruController::class, 'update'])->name('mata-pelajaran.update');
        Route::get('mata-pelajaran/{kelas_mapel_id}', [KelasMapelGuruController::class, 'destroy'])->name('mata-pelajaran.destroy');

        // Materi
        Route::get('materi', [MateriGuruController::class, 'index'])->name('materi.index');
        Route::get('materi/create', [MateriGuruController::class, 'create'])->name('materi.create');
        Route::post('materi', [MateriGuruController::class, 'store'])->name('materi.store');


        // Ujian
        Route::get('ujian', [UjianGuruController::class, 'index']);

        // Soal
        Route::get('ujian/{ujian_id}/soal', [SoalGuruController::class, 'index'])->name('soal.index');
        Route::get('ujian/{ujian_id}/soal/create', [SoalGuruController::class, 'create'])->name('soal.create');
        Route::post('ujian/{ujian_id}/soal', [SoalGuruController::class, 'store'])->name('soal.store');
        Route::get('ujian/{ujian_id}/soal/{soal_id}/edit', [SoalGuruController::class, 'edit'])->name('soal.edit');
        Route::put('ujian/{ujian_id}/soal/{soal_id}', [SoalGuruController::class, 'update'])->name('soal.update');
        Route::get('ujian/{ujian_id}/soal/{soal_id}', [SoalGuruController::class, 'destroy'])->name('soal.destroy');

        // kelas ujian
        Route::get('ujian/{ujian_id}/kelas_ujian', [KelasUjianGuruController::class, 'index'])->name('kelas_ujian.index');
        Route::get('ujian/{ujian_id}/kelas_ujian/create', [KelasUjianGuruController::class, 'create'])->name('kelas_ujian.create');
        Route::post('ujian/{ujian_id}/kelas_ujian', [KelasUjianGuruController::class, 'store'])->name('kelas_ujian.store');

        // Nilaii
        Route::get('nilai', [NilaiGuruController::class, 'index'])->name('nilai.index');
        Route::get('nilai/{ujian_id}/{kelas_id}', [NilaiGuruController::class, 'show'])->name('nilai.show');
    });

    Route::post('logout', [GuruAuthController::class, 'destroy'])->name('logout');
});

