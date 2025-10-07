<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    use HasFactory;

    protected $fillable = ['nama'];

    public function soals()
    {
        return $this->hasMany(Soal::class);
    }
}
