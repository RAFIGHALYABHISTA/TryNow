<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Paket;
use App\Models\JawabanPeserta;
use Illuminate\Support\Facades\Auth;

class HasilController extends Controller
{
    public function show(Paket $paket)
    {
        $user = Auth::user();

        // Check if user has completed this package
        $transaksi = \App\Models\Transaksi::where('user_id', $user->id)
            ->where('paket_id', $paket->id)
            ->where('status', 'completed')
            ->first();

        if (!$transaksi) {
            return redirect()->route('user.kerjakan')->with('error', 'Anda belum menyelesaikan tryout ini.');
        }

        $jawabanPesertas = JawabanPeserta::where('user_id', $user->id)
            ->whereHas('soal.mapel', function($query) use ($paket) {
                $query->where('paket_id', $paket->id);
            })
            ->with('soal')
            ->get();

        $score = $jawabanPesertas->where('is_benar', true)->count();
        $total = $jawabanPesertas->count();
        $percentage = $total > 0 ? round(($score / $total) * 100, 2) : 0;

        return view('user.hasil.show', compact('paket', 'jawabanPesertas', 'score', 'total', 'percentage'));
    }
}
