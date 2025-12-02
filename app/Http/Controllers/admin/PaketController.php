<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Paket;
use Illuminate\Http\Request;

class PaketController extends Controller
{
    public function index()
    {
        $pakets = Paket::all();
        return view('admin.pakets.index', compact('pakets'));
    }

    public function create()
    {
        return view('admin.pakets.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_paket' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'harga' => 'nullable|numeric',
        ]);

        Paket::create($request->only(['nama_paket', 'deskripsi', 'harga']));

        return redirect()->route('admin.pakets.index')->with('success', 'Paket berhasil dibuat.');
    }

    public function edit(Paket $paket)
    {
        return view('admin.pakets.edit', compact('paket'));
    }

    public function update(Request $request, Paket $paket)
    {
        $request->validate([
            'nama_paket' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'harga' => 'nullable|numeric',
        ]);

        $paket->update($request->only(['nama_paket', 'deskripsi', 'harga']));
        return redirect()->route('admin.pakets.index')->with('success', 'Paket berhasil diupdate.');
    }

    public function destroy(Paket $paket)
    {
        $paket->delete();
        return redirect()->route('admin.pakets.index')->with('success', 'Paket dihapus.');
    }
}
