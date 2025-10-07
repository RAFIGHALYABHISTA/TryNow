<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'deskripsi',
        'harga',
        'tipe', // basic, reguler, premium
    ];

    public function soals()
    {
        return $this->belongsToMany(Soal::class, 'paket_soal');
    }

    public function transaksis()
    {
        return $this->hasMany(Transaksi::class);
    }
}