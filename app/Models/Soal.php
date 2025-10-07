<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Soal extends Model
{
    use HasFactory;

    protected $fillable = [
        'mapel_id',
        'pertanyaan',
        'opsi_a',
        'opsi_b',
        'opsi_c',
        'opsi_d',
        'jawaban_benar',
    ];

    public function mapel()
    {
        return $this->belongsTo(Mapel::class);
    }

    public function pakets()
    {
        return $this->belongsToMany(Paket::class, 'paket_soal');
    }

    public function jawabanPesertas()
    {
        return $this->hasMany(JawabanPeserta::class);
    }
}