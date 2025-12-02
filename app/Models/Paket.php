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
        // pakets and soals are connected via pivot table paket_soal (many-to-many)
        return $this->belongsToMany(Soal::class, 'paket_soal');
    }

    public function transaksis()
    {
        return $this->hasMany(Transaksi::class);
    }
}