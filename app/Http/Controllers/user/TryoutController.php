<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Paket;
use App\Models\Soal;
use Illuminate\Http\Request;

class TryoutController extends Controller
{
    public function start(Paket $paket)
    {
        $soals = $paket->soals;
        return view('user.tryout.start', compact('paket', 'soals'));
    }

    public function submit(Request $request, Paket $paket)
    {
        // Simpan jawaban user
        // hitung skor (sementara dummy)
        $score = rand(50, 100);

        return redirect()->route('user.hasil.show', $paket)->with('success', "Tryout selesai. Skor: $score");
    }
}
