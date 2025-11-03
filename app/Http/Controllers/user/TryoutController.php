<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Paket;
use App\Models\Soal;
use App\Models\JawabanPeserta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TryoutController extends Controller
{
    public function start(Paket $paket)
    {
        $soals = $paket->soals()->with('mapel')->get();
        return view('user.tryout.start', compact('paket', 'soals'));
    }

    public function submit(Request $request, Paket $paket)
    {
        $user = Auth::user();
        $answers = $request->input('answers', []);
        $score = 0;
        $totalQuestions = count($answers);

        foreach ($answers as $soalId => $jawaban) {
            $soal = Soal::find($soalId);
            $isBenar = $soal->jawaban_benar === $jawaban;

            if ($isBenar) {
                $score++;
            }

            // Save answer (avoid duplicates)
            JawabanPeserta::updateOrCreate(
                [
                    'user_id' => $user->id,
                    'soal_id' => $soalId,
                ],
                [
                    'jawaban' => $jawaban,
                    'is_benar' => $isBenar,
                ]
            );
        }

        $percentage = $totalQuestions > 0 ? round(($score / $totalQuestions) * 100, 2) : 0;

        // Update transaksi status to completed
        $transaksi = \App\Models\Transaksi::where('user_id', $user->id)
            ->where('paket_id', $paket->id)
            ->where('status', 'success')
            ->first();

        if ($transaksi) {
            $transaksi->update(['status' => 'completed']);
        }

        return redirect()->route('user.result')->with('success', "Tryout selesai. Skor: $score/$totalQuestions ($percentage%)");
    }
}
