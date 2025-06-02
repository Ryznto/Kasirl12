<?php

namespace App\Livewire;

use Livewire\Component;

class Beranda extends Component
{

    public $jumlahPengguna;
    public $jumlahTransaksi;
    public $jumlahProduk;
    public $laporanHariIni;

    public function mount()
    {
        $this->jumlahPengguna = \App\Models\User::count();
        $this->jumlahTransaksi = \App\Models\Transaksi::where('status','selesai')->count();
        $this->jumlahProduk = \App\Models\Produk::count();
        $this->laporanHariIni = \App\Models\Transaksi::whereDate('created_at', now())->get()->count();
    }

    


    public function render()
    {
        return view('livewire.beranda');
    }
}
