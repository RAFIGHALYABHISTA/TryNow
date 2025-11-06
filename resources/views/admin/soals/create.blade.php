@extends('admin.layout')

@section('title', 'Tambah Soal')

@section('content')
    <h1 class="text-2xl font-bold mb-6">Tambah Soal Baru</h1>

    <div class="bg-white p-6 rounded shadow max-w-xl">
        <form action="{{ route('admin.soals.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Pertanyaan</label>
                <textarea name="pertanyaan" rows="3"
                    class="mt-1 block w-full rounded border-gray-300 shadow-sm"
                    placeholder="Contoh: Apa ibu kota Indonesia?"></textarea>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Kategori</label>
                <select name="kategori" class="mt-1 block w-full rounded border-gray-300 shadow-sm">
                    <option value="Geografi">Geografi</option>
                    <option value="Matematika">Matematika</option>
                    <option value="Bahasa">Bahasa</option>
                </select>
            </div>

            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700">Jawaban Benar</label>
                <input type="text" name="jawaban_benar"
                    class="mt-1 block w-full rounded border-gray-300 shadow-sm"
                    placeholder="Contoh: Jakarta">
            </div>

            <button type="submit"
                class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">Simpan Soal</button>
        </form>
    </div>
@endsection