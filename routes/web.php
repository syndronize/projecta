<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\PenilaianController;
use App\Http\Controllers\SewaController;

Route::middleware(['belum_login'])->group(function () {
    Route::get('/','App\Http\Controllers\DashboardController@login')->name('login');
    Route::get('/register','App\Http\Controllers\DashboardController@register')->name('register');
    Route::post('/register-akun','App\Http\Controllers\DashboardController@registerakun')->name('register.akun');
    Route::post('/masuk-akun','App\Http\Controllers\DashboardController@aksiLogin')->name('aksilogin');
});

Route::middleware(['sudah_login'])->group(function () {
    Route::get('/dashboard','App\Http\Controllers\DashboardController@dashboard')->name('dashboard');
    // Barang
    Route::get('/barang',[BarangController::class, 'index'])->name('barang');
    Route::get('/barang/create',[BarangController::class, 'create'])->name('barang.create');
    Route::post('/barang',[BarangController::class, 'store'])->name('barang.store');
    Route::get('/barang/{barang}',[BarangController::class, 'edit'])->name('barang.edit');
    Route::put('/barang/{barang}',[BarangController::class, 'update'])->name('barang.update');
    Route::get('/barang/delete/{barang}',[BarangController::class, 'destroy'])->name('barang.delete');

    // Sewa
    Route::get('/sewa',[SewaController::class, 'index'])->name('sewa');
    Route::get('/sewa/create',[SewaController::class, 'create'])->name('sewa.create');
    Route::post('/sewa',[SewaController::class, 'store'])->name('sewa.store');
    Route::get('/sewa/{sewa}',[SewaController::class, 'edit'])->name('sewa.edit');
    Route::put('/sewa/{sewa}',[SewaController::class, 'update'])->name('sewa.update');
    Route::get('/sewa/delete/{sewa}',[SewaController::class, 'destroy'])->name('sewa.delete');
    // Penilaian
    Route::get('/penilaian',[PenilaianController::class, 'index'])->name('penilaian');
    // Member
    Route::get('/member',[MemberController::class, 'index'])->name('member');
    Route::get('/member/create',[MemberController::class, 'create'])->name('member.create');
    Route::post('/member',[MemberController::class, 'store'])->name('member.store');
    Route::get('/member/{member}',[MemberController::class, 'edit'])->name('member.edit');
    Route::put('/member/{member}',[MemberController::class, 'update'])->name('member.update');
    Route::get('/member/delete/{member}',[MemberController::class, 'destroy'])->name('member.delete');


    Route::post('/pengembalian',[SewaController::class, 'kembalikan'])->name('pengembalian');

    Route::get('/logout','App\Http\Controllers\DashboardController@logout')->name('logout');
});
