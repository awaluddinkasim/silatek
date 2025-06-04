<?php

use App\Http\Controllers\Staf\AccountController;
use App\Http\Controllers\Staf\DashboardController;
use App\Http\Controllers\Staf\PengajuanController;
use App\Http\Controllers\Staf\PengumumanController;
use App\Http\Controllers\Staf\PersyaratanBerkasController;
use App\Http\Controllers\Staf\SuratController;
use App\Http\Controllers\Staf\UserController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth:staf', 'prefix' => 'staf', 'as' => 'staf.'], function () {
  Route::redirect('/', '/staf/dashboard')->name('index');

  Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

  Route::get('/pengumuman', [PengumumanController::class, 'index'])->name('pengumuman');
  Route::post('/pengumuman', [PengumumanController::class, 'store'])->name('pengumuman.store');
  Route::put('/pengumuman/{pengumuman}', [PengumumanController::class, 'update'])->name('pengumuman.update');
  Route::delete('/pengumuman/{pengumuman}', [PengumumanController::class, 'destroy'])->name('pengumuman.destroy');

  Route::get('/mahasiswa', [UserController::class, 'index'])->name('mahasiswa');
  Route::post('/mahasiswa', [UserController::class, 'store'])->name('mahasiswa.store');
  Route::get('/mahasiswa/{user}/edit', [UserController::class, 'edit'])->name('mahasiswa.edit');
  Route::put('/mahasiswa/{user}', [UserController::class, 'update'])->name('mahasiswa.update');
  Route::delete('/mahasiswa/{user}', [UserController::class, 'destroy'])->name('mahasiswa.destroy');

  Route::get('/layanan/{layanan}', [PengajuanController::class, 'index'])->name('layanan');
  Route::get('/layanan/{layanan}/detail/{pengajuan:uuid}', [PengajuanController::class, 'show'])->name('layanan.show');

  Route::post('/layanan/{layanan}/terima/{pengajuan:uuid}', [SuratController::class, 'terima'])->name('layanan.terima');
  Route::post('/layanan/{layanan}/tolak/{pengajuan:uuid}', [SuratController::class, 'tolak'])->name('layanan.tolak');

  Route::get('/layanan/{layanan}/berkas', [PersyaratanBerkasController::class, 'index'])->name('layanan.berkas');
  Route::post('/layanan/{layanan}/berkas', [PersyaratanBerkasController::class, 'store'])->name('layanan.berkas.store');
  Route::delete('/layanan/{layanan}/berkas/{berkas}', [PersyaratanBerkasController::class, 'destroy'])->name('layanan.berkas.destroy');

  Route::get('/surat/{layanan}', [SuratController::class, 'index'])->name('surat');
  Route::get('/surat/{layanan}/{pengajuan:uuid}', [SuratController::class, 'show'])->name('surat.show');
  Route::get('/surat/{layanan}/{pengajuan:uuid}/pdf', [SuratController::class, 'pdf'])->name('surat.pdf');

  Route::get('/account', [AccountController::class, 'index'])->name('account');
  Route::put('/account/update', [AccountController::class, 'updateAccount'])->name('account.update');
  Route::put('/account/password', [AccountController::class, 'updatePassword'])->name('account.password');
});
