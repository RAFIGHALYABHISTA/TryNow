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
        $mapels = \App\Models\Mapel::all();
        return view('admin.soals.create', compact('pakets', 'mapels'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'mapel_id' => 'required|exists:mapels,id',
            'paket_id' => 'nullable|exists:pakets,id',
            'pertanyaan' => 'required|string',
            'pilihan_a' => 'required|string',
            'pilihan_b' => 'required|string',
            'pilihan_c' => 'required|string',
            'pilihan_d' => 'required|string',
            'jawaban_benar' => 'required|in:a,b,c,d',
        ]);

        $soal = Soal::create($request->only([
            'mapel_id', 'pertanyaan', 'pilihan_a', 'pilihan_b', 'pilihan_c', 'pilihan_d', 'jawaban_benar'
        ]));

        // Attach soal to paket if paket_id provided
        if ($request->filled('paket_id')) {
            $soal->pakets()->attach($request->input('paket_id'));
        }

        return redirect()->route('admin.soals.index')->with('success', 'Soal berhasil ditambahkan.');
    }

    public function edit(Soal $soal)
    {
        $pakets = Paket::all();
        $mapels = \App\Models\Mapel::all();
        return view('admin.soals.edit', compact('soal', 'pakets', 'mapels'));
    }

    public function update(Request $request, Soal $soal)
    {
        $request->validate([
            'mapel_id' => 'required|exists:mapels,id',
            'paket_id' => 'nullable|exists:pakets,id',
            'pertanyaan' => 'required|string',
            'pilihan_a' => 'required|string',
            'pilihan_b' => 'required|string',
            'pilihan_c' => 'required|string',
            'pilihan_d' => 'required|string',
            'jawaban_benar' => 'required|in:a,b,c,d',
        ]);

        $soal->update($request->only([
            'mapel_id', 'pertanyaan', 'pilihan_a', 'pilihan_b', 'pilihan_c', 'pilihan_d', 'jawaban_benar'
        ]));

        // sync paket pivot table
        if ($request->filled('paket_id')) {
            $soal->pakets()->sync([$request->input('paket_id')]);
        } else {
            $soal->pakets()->detach();
        }

        return redirect()->route('admin.soals.index')->with('success', 'Soal berhasil diperbarui.');
    }

    public function destroy(Soal $soal)
    {
        $soal->delete();
        return redirect()->route('admin.soals.index')->with('success', 'Soal berhasil dihapus.');
    }
}
