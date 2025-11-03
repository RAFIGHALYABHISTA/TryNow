<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_paket',
        'deskripsi',
        'harga',
    ];

    public function soals()
    {
        return $this->hasManyThrough(Soal::class, Mapel::class);
    }

    public function transaksis()
    {
        return $this->hasMany(Transaksi::class);
    }
}