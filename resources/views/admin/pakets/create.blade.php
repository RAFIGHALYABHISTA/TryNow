@extends('admin.layout')

@section('title', 'Tambah Paket')

@section('content')
    <h1 class="text-2xl font-bold mb-6">Tambah Paket TryOut</h1>

    <div class="bg-white p-6 rounded shadow max-w-xl">
        <form action="{{ route('admin.pakets.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Nama Paket</label>
                <input type="text" name="nama_paket" value="{{ old('nama_paket') }}"
                    class="mt-1 block w-full rounded border-gray-300 shadow-sm" placeholder="Contoh: UTBK TPS 2025">
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Deskripsi</label>
                <textarea name="deskripsi" rows="3" class="mt-1 block w-full rounded border-gray-300 shadow-sm" placeholder="Deskripsi singkat paket">{{ old('deskripsi') }}</textarea>
            </div>

            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700">Harga</label>
                <input type="number" step="0.01" name="harga" value="{{ old('harga', 0) }}"
                    class="mt-1 block w-full rounded border-gray-300 shadow-sm" placeholder="0.00">
            </div>

            <button type="submit"
                class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">Simpan Paket</button>
        </form>
    </div>
@endsection