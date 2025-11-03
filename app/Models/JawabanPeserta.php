<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JawabanPeserta extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'soal_id',
        'jawaban',
        'is_benar',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function soal()
    {
        return $this->belongsTo(Soal::class);
    }
}