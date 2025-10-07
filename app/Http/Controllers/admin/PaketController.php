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
        Paket::create($request->all());
        return redirect()->route('admin.pakets.index')->with('success', 'Paket berhasil dibuat.');
    }

    public function edit(Paket $paket)
    {
        return view('admin.pakets.edit', compact('paket'));
    }

    public function update(Request $request, Paket $paket)
    {
        $paket->update($request->all());
        return redirect()->route('admin.pakets.index')->with('success', 'Paket berhasil diupdate.');
    }

    public function destroy(Paket $paket)
    {
        $paket->delete();
        return redirect()->route('admin.pakets.index')->with('success', 'Paket dihapus.');
    }
}
