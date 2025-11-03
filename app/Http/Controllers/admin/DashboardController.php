<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Paket;
use App\Models\Soal;
use App\Models\Transaksi;

class DashboardController extends Controller
{
    public function index()
    {
        $totalUsers = User::where('role', 'user')->count();
        $totalPakets = Paket::count();
        $totalSoals = Soal::count();
        $totalTransactions = Transaksi::count();
        $recentTransactions = Transaksi::with(['user', 'paket'])->latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'totalUsers',
            'totalPakets',
            'totalSoals',
            'totalTransactions',
            'recentTransactions'
        ));
    }
}
