<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Paket;
use App\Models\Transaksi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $pakets = Paket::all();
        return view('user.dashboard', compact('user', 'pakets'));
    }

    public function paket()
    {
        $pakets = Paket::all();
        return view('user.paket', compact('pakets'));
    }

    public function kerjakan()
    {
        $user = Auth::user();
        $transaksis = Transaksi::where('user_id', $user->id)
            ->where('status', 'success')
            ->with('paket')
            ->get();

        // Calculate progress for each transaction
        foreach ($transaksis as $transaksi) {
            $totalSoals = $transaksi->paket->soals()->count();
            $answeredSoals = \App\Models\JawabanPeserta::where('user_id', $user->id)
                ->whereHas('soal', function($q) use ($transaksi) {
                    $q->whereHas('pakets', function($pq) use ($transaksi) {
                        $pq->where('paket_id', $transaksi->paket_id);
                    });
                })->count();

            $transaksi->progress = $totalSoals > 0 ? round(($answeredSoals / $totalSoals) * 100) : 0;
            $transaksi->is_completed = $transaksi->progress == 100;
        }

        return view('user.kerjakan', compact('transaksis'));
    }

    public function result()
    {
        $user = Auth::user();
        $transaksis = Transaksi::where('user_id', $user->id)->where('status', 'completed')->with('paket')->get();
        return view('user.result', compact('transaksis'));
    }

    public function profile()
    {
        $user = Auth::user();

        // Calculate statistics
        $completedTryouts = Transaksi::where('user_id', $user->id)->where('status', 'completed')->count();
        $averageScore = 0;
        if ($completedTryouts > 0) {
            $totalScore = 0;
            $totalQuestions = 0;
            $transaksis = Transaksi::where('user_id', $user->id)->where('status', 'completed')->with('paket')->get();
            foreach ($transaksis as $transaksi) {
                $jawabanPesertas = \App\Models\JawabanPeserta::where('user_id', $user->id)
                    ->whereHas('soal.mapel', function($q) use ($transaksi) {
                        $q->where('paket_id', $transaksi->paket_id);
                    })->get();
                $score = $jawabanPesertas->where('is_benar', true)->count();
                $totalScore += $score;
                $totalQuestions += $jawabanPesertas->count();
            }
            $averageScore = $totalQuestions > 0 ? round(($totalScore / $totalQuestions) * 100, 0) : 0;
        }

        // Get active package
        $activeTransaksi = Transaksi::where('user_id', $user->id)->where('status', 'success')->with('paket')->first();

        return view('user.profile', compact('user', 'completedTryouts', 'averageScore', 'activeTransaksi'));
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . auth()->id(),
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $user = auth()->user();
        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('user.profile')->with('success', 'Profile berhasil diperbarui!');
    }
}
