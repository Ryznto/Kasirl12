<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Livewire\User;
use App\Livewire\Produk;
use App\Livewire\Beranda;
use App\Livewire\Transaksi;
use App\Livewire\Laporan;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home',Beranda::class)->middleware(['auth'])->name('home');
Route::get('/user',user::class)->middleware(['auth'])->name('user');
Route::get('/laporan',Laporan::class)->middleware(['auth'])->name('laporan');
Route::get('/produk',Produk::class)->middleware(['auth'])->name('produk');
Route::get('/transaksi',Transaksi::class)->middleware(['auth'])->name('transaksi');

