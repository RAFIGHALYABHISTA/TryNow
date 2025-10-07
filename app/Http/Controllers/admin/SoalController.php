=<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Soal;
use App\Models\Paket;
use Illuminate\Http\Request;

class SoalController extends Controller
{
    public function index()
    {
        $soals = Soal::with('paket')->get();
        return view('admin.soals.index', compact('soals'));
    }

    public function create()
    {
        $pakets = Paket::all();
        return view('admin.soals.create', compact('pakets'));
    }

    public function store(Request $request)
    {
        Soal::create($request->all());
        return redirect()->route('admin.soals.index')->with('success', 'Soal berhasil ditambahkan.');
    }
}
