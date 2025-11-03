<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Soal;
use App\Models\Paket;
use Illuminate\Http\Request;

class SoalController extends Controller
{
    public function index()
    {
        $soals = Soal::with('pakets')->get();
        return view('admin.soals.index', compact('soals'));
    }

    public function create()
    {
        $pakets = Paket::all();
        return view('admin.soals.create', compact('pakets'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'paket_id' => 'required|exists:pakets,id',
            'pertanyaan' => 'required|string',
            'pilihan_a' => 'required|string',
            'pilihan_b' => 'required|string',
            'pilihan_c' => 'required|string',
            'pilihan_d' => 'required|string',
            'jawaban_benar' => 'required|in:a,b,c,d',
        ]);

        Soal::create($request->all());
        return redirect()->route('admin.soals.index')->with('success', 'Soal berhasil ditambahkan.');
    }

    public function edit(Soal $soal)
    {
        $pakets = Paket::all();
        return view('admin.soals.edit', compact('soal', 'pakets'));
    }

    public function update(Request $request, Soal $soal)
    {
        $request->validate([
            'paket_id' => 'required|exists:pakets,id',
            'pertanyaan' => 'required|string',
            'pilihan_a' => 'required|string',
            'pilihan_b' => 'required|string',
            'pilihan_c' => 'required|string',
            'pilihan_d' => 'required|string',
            'jawaban_benar' => 'required|in:a,b,c,d',
        ]);

        $soal->update($request->all());
        return redirect()->route('admin.soals.index')->with('success', 'Soal berhasil diperbarui.');
    }

    public function destroy(Soal $soal)
    {
        $soal->delete();
        return redirect()->route('admin.soals.index')->with('success', 'Soal berhasil dihapus.');
    }
}
