<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JenisPengaduanController;
use App\Http\Controllers\KategoriInstansiController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubjekLaporanController;
use App\Http\Controllers\UserController;
use App\Models\JenisPengaduan;
use App\Models\KategoriInstansi;
use App\Models\KategoriPelapor;
use App\Models\SubjekLaporan;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome');
Route::get('buat-pengaduan', [PengaduanController::class, 'create'])->name('laporan.create');
Route::get('lacak-pengaduan', [PengaduanController::class, 'track'])->name('laporan.track');
Route::post('lacak-pengaduan', [PengaduanController::class, 'trackSearch'])->name('laporan.track.search');
Route::post('buat-pengaduan', [PengaduanController::class, 'store'])->name('laporan.store');
Route::get('download-registrasi/{nomor_pendaftaran}', [PengaduanController::class, 'downloadRegistrasi'])->name('laporan.download.registrasi');

Route::middleware(['auth', 'role:superadmin'])->group(function () {
    Route::resource('admin/users', UserController::class);
});
Route::middleware(['auth', 'role:superadmin,admin'])->group(function () {
    Route::get('admin/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('admin/pengaduan', [PengaduanController::class, 'index'])->name('pengaduan.index');
    Route::post('admin/status-pengaduan', [PengaduanController::class, 'changeStatus'])->name('pengaduan.status');
    Route::get('admin/pengaturan', function () {
        $subjek = SubjekLaporan::all();
        $kategori = KategoriPelapor::all();
        $instansi = KategoriInstansi::all();
        return view('master.pengaturan.index', compact('subjek', 'instansi', 'kategori'));
    })->name('pengaturan.index');
    Route::post('admin/kategori-instansi', [KategoriInstansiController::class, 'store'])->name('kategori-instansi.store');
    Route::delete('admin/kategori-instansi/{kategori_instansi}', [KategoriInstansiController::class, 'destroy'])->name('kategori-instansi.destroy');
    Route::resource('admin/subjek-laporan', SubjekLaporanController::class);
});
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
