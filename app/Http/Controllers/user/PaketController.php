<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Paket;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaketController extends Controller
{
    public function index()
    {
        $pakets = Paket::all();
        return view('user.paket', compact('pakets'));
    }

    public function beli(Request $request, Paket $paket)
    {
        $user = Auth::user();

        // Check if user already has this package
        $existingTransaction = Transaksi::where('user_id', $user->id)
            ->where('paket_id', $paket->id)
            ->where('status', 'success')
            ->first();

        if ($existingTransaction) {
            return redirect()->back()->with('error', 'Anda sudah memiliki paket ini.');
        }

        // Create transaction
        Transaksi::create([
            'user_id' => $user->id,
            'paket_id' => $paket->id,
            'jumlah' => $paket->harga,
            'status' => 'success', // Assuming instant payment for demo
            'tanggal_transaksi' => now(),
        ]);

        return redirect()->route('user.kerjakan')->with('success', 'Berhasil membeli paket!');
    }
}
