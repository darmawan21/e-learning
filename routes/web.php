<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NilaiGuruController;
use App\Http\Controllers\ForumSiswaController;
use App\Http\Controllers\TugasSiswaController;
use App\Http\Controllers\UjianSiswaController;
use App\Http\Controllers\ProfilSiswaController;
use App\Http\Controllers\Guru\SoalGuruController;
use App\Http\Controllers\Guru\ForumGuruController;
use App\Http\Controllers\Guru\TugasGuruController;
use App\Http\Controllers\Guru\UjianGuruController;
use App\Http\Controllers\Guru\MateriGuruController;
use App\Http\Controllers\Guru\ProfilGuruController;
use App\Http\Controllers\Guru\Auth\GuruAuthController;
use App\Http\Controllers\Guru\DashboardGuruController;
use App\Http\Controllers\MataPelajaranSiswaController;
use App\Http\Controllers\Guru\KelasMapelGuruController;
use App\Http\Controllers\Guru\KelasTugasGuruController;
use App\Http\Controllers\Guru\KelasUjianGuruController;
use App\Http\Controllers\Guru\PengumumanGuruController;
use App\Http\Controllers\Guru\TugasSiswaGuruController;
use App\Http\Controllers\Admin\Auth\AdminAuthController;
use App\Http\Controllers\Admin\DashboardAdminController;

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

// Route::get('/dashboard', function () {
//     return view('pages.home');
// })->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

// User Routes
Route::middleware(['auth'])->group(function () {

    // Dashboard
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

    // Profil Siswa
    Route::get('profil-siswa', [ProfilSiswaController::class, 'index'])->name('profil_siswa.index');
    Route::get('profil-siswa/{user_id}/edit', [ProfilSiswaController::class, 'edit'])->name('profil_siswa.edit');
    Route::put('profil-siswa/{user_id}', [ProfilSiswaController::class, 'update'])->name('profil_siswa.update');

    // Kelas Matapelajaran
    Route::get('mata-pelajaran', [MataPelajaranSiswaController::class, 'index'])->name('mata_pelajaran.index');
    Route::get('mata-pelajaran/{kelas_mapel_id}/show', [MataPelajaranSiswaController::class, 'show'])->name('mata_pelajaran.show');
    Route::get('mata-pelajaran/{kelas_mapel_id}/show/{materi_id}/detail', [MataPelajaranSiswaController::class, 'detail'])->name('mata_pelajaran.detail');
    
    // Tugas Siswa
    Route::get('tugas', [TugasSiswaController::class, 'index'])->name('tugas.index');
    Route::get('tugas/{tugas_id}/create', [TugasSiswaController::class, 'create'])->name('tugas.create');
    Route::post('tugas/{tugas_id}', [TugasSiswaController::class, 'store'])->name('tugas.store');

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

        // Pengumuman
        Route::get('pengumuman', [PengumumanGuruController::class, 'index'])->name('pengumuman.index');
        Route::get('pengumuman/create', [PengumumanGuruController::class, 'create'])->name('pengumuman.create');
        Route::post('pengumuman', [PengumumanGuruController::class, 'store'])->name('pengumuman.store');
        Route::get('pengumuman/{pengumuman_guru_id}/edit', [PengumumanGuruController::class, 'edit'])->name('pengumuman.edit');
        Route::put('pengumuman/{pengumuman_guru_id}', [PengumumanGuruController::class, 'update'])->name('pengumuman.update');
        Route::get('pengumuman/{pengumuman_guru_id}', [PengumumanGuruController::class, 'destroy'])->name('pengumuman.destroy');

        
        // Profil Guru
        Route::get('profil-guru', [ProfilGuruController::class, 'index'])->name('profil_guru.index');
        Route::get('profil-guru/{guru_id}/edit', [ProfilGuruController::class, 'edit'])->name('profil_guru.edit');
        Route::put('profil-guru/{guru_id}', [ProfilGuruController::class, 'update'])->name('profil_guru.update');

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
        Route::get('materi/{materi_id}/edit', [MateriGuruController::class, 'edit'])->name('materi.edit');
        Route::put('materi/{materi_id}', [MateriGuruController::class, 'update'])->name('materi.update');
        Route::get('materi/{materi_id}', [MateriGuruController::class, 'destroy'])->name('materi.destroy');

        // Tugas
        Route::get('tugas', [TugasGuruController::class, 'index'])->name('tugas.index');
        Route::get('tugas/create', [TugasGuruController::class, 'create'])->name('tugas.create');
        Route::post('tugas', [TugasGuruController::class, 'store'])->name('tugas.store');
        Route::get('tugas/{tugas_id}/edit', [TugasGuruController::class, 'edit'])->name('tugas.edit');
        Route::put('tugas/{tugas_id}', [TugasGuruController::class, 'update'])->name('tugas.update');
        Route::get('tugas/{tugas_id}', [TugasGuruController::class, 'destroy'])->name('tugas.destroy');

        // Kelas Tugas
        Route::get('tugas/{tugas_id}/kelas-tugas', [KelasTugasGuruController::class, 'index'])->name('kelas_tugas.index');
        Route::get('tugas/{tugas_id}/kelas-tugas/create', [KelasTugasGuruController::class, 'create'])->name('kelas_tugas.create');
        Route::post('tugas/{tugas_id}/kelas-tugas', [KelasTugasGuruController::class, 'store'])->name('kelas_tugas.store');
        Route::get('tugas/{tugas_id}/kelas-tugas/{kelas_tugas_id}/edit', [KelasTugasGuruController::class, 'edit'])->name('kelas_tugas.edit');
        Route::put('tugas/{tugas_id}/kelas-tugas/{kelas_tugas_id}', [KelasTugasGuruController::class, 'update'])->name('kelas_tugas.update');
        Route::get('tugas/{tugas_id}/kelas-tugas/{kelas_tugas_id}', [KelasTugasGuruController::class, 'destroy'])->name('kelas_tugas.destroy');

        // Daftar Pengumpulan Tugas Siswa
        Route::get('data-tugas', [TugasSiswaGuruController::class, 'index'])->name('tugas_siswa.index');
        Route::get('data-tugas/{tugas_id}/{kelas_id}', [TugasSiswaGuruController::class, 'show'])->name('tugas_siswa.show'); 

        // Ujian
        Route::get('ujian', [UjianGuruController::class, 'index'])->name('ujian.index');
        Route::get('ujian/create', [UjianGuruController::class, 'create'])->name('ujian.create');
        Route::post('ujian', [UjianGuruController::class, 'store'])->name('ujian.store');
        Route::get('ujian/{ujian_id}/edit', [UjianGuruController::class, 'edit'])->name('ujian.edit');
        Route::put('ujian/{ujian_id}', [UjianGuruController::class, 'update'])->name('ujian.update');
        Route::get('ujian/{ujian_id}', [UjianGuruController::class, 'destroy'])->name('ujian.destroy');

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
        Route::get('ujian/{ujian_id}/kelas_ujian/{kelas_ujian_id}/edit', [KelasUjianGuruController::class, 'edit'])->name('kelas_ujian.edit');
        Route::put('ujian/{ujian_id}/kelas_ujian/{kelas_ujian_id}', [KelasUjianGuruController::class, 'update'])->name('kelas_ujian.update');
        Route::get('ujian/{ujian_id}/kelas_ujian/{kelas_ujian_id}', [KelasUjianGuruController::class, 'destroy'])->name('kelas_ujian.destroy');

        // Nilai
        Route::get('nilai', [NilaiGuruController::class, 'index'])->name('nilai.index');
        Route::get('nilai/{ujian_id}/{kelas_id}', [NilaiGuruController::class, 'show'])->name('nilai.show');

        // Forum
        Route::get('forum', [ForumGuruController::class, 'index'])->name('forum.index');
        Route::get('forum/create', [ForumGuruController::class, 'create'])->name('forum.create');
        Route::post('forum', [ForumGuruController::class, 'store'])->name('forum.store');
        Route::get('forum/{id}/view', [ForumGuruController::class, 'view'])->name('forum.view');
        Route::post('forum/{id}/view', [ForumGuruController::class, 'post'])->name('forum.post');
    });

    Route::post('logout', [GuruAuthController::class, 'destroy'])->name('logout');
});

