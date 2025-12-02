@extends('admin.layout')

@section('title', 'Edit Paket')

@section('content')
    <h1 class="text-2xl font-bold mb-6">Edit Paket</h1>

    <div class="bg-white p-6 rounded shadow max-w-xl">
        <form action="{{ route('admin.pakets.update', $paket) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Nama Paket</label>
                <input type="text" name="nama_paket" value="{{ old('nama_paket', $paket->nama_paket) }}"
                    class="mt-1 block w-full rounded border-gray-300 shadow-sm">
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Deskripsi</label>
                <textarea name="deskripsi" rows="3" class="mt-1 block w-full rounded border-gray-300 shadow-sm">{{ old('deskripsi', $paket->deskripsi) }}</textarea>
            </div>

            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700">Harga</label>
                <input type="number" step="0.01" name="harga" value="{{ old('harga', $paket->harga) }}"
                    class="mt-1 block w-full rounded border-gray-300 shadow-sm">
            </div>

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">Perbarui Paket</button>
        </form>
    </div>
@endsection
