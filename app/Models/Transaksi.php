<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\DetailTransaksi;
use Ilmuminate\Database\Eloquent\Factories\HasFactory;

class Transaksi extends Model
{
    protected $fillable = ['kode', 'total', 'status'];

    public function detailTransaksi()
    {
        return $this->hasMany(DetailTransaksi::class);
    }
}
