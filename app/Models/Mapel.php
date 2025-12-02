<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_mapel',
        'paket_id',
    ];

    public function soals()
    {
        return $this->hasMany(Soal::class);
    }

    public function paket()
    {
        return $this->belongsTo(Paket::class);
    }
}
