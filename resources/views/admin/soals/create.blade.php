@extends('admin.layout')

@section('title', 'Tambah Soal')

@section('content')
    <h1 class="text-2xl font-bold mb-6">Tambah Soal Baru</h1>

    <div class="bg-white p-6 rounded shadow max-w-xl">
        <form action="{{ route('admin.soals.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Mapel</label>
                <select name="mapel_id" class="mt-1 block w-full rounded border-gray-300 shadow-sm">
                    @foreach($mapels as $mapel)
                        <option value="{{ $mapel->id }}">{{ $mapel->nama_mapel }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Pertanyaan</label>
                <textarea name="pertanyaan" rows="3" class="mt-1 block w-full rounded border-gray-300 shadow-sm" placeholder="Masukkan pertanyaan">{{ old('pertanyaan') }}</textarea>
            </div>

            <div class="grid grid-cols-2 gap-4 mb-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Pilihan A</label>
                    <input type="text" name="pilihan_a" class="mt-1 block w-full rounded border-gray-300 shadow-sm" value="{{ old('pilihan_a') }}">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Pilihan B</label>
                    <input type="text" name="pilihan_b" class="mt-1 block w-full rounded border-gray-300 shadow-sm" value="{{ old('pilihan_b') }}">
                </div>
            </div>
            <div class="grid grid-cols-2 gap-4 mb-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Pilihan C</label>
                    <input type="text" name="pilihan_c" class="mt-1 block w-full rounded border-gray-300 shadow-sm" value="{{ old('pilihan_c') }}">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Pilihan D</label>
                    <input type="text" name="pilihan_d" class="mt-1 block w-full rounded border-gray-300 shadow-sm" value="{{ old('pilihan_d') }}">
                </div>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Jawaban Benar</label>
                <select name="jawaban_benar" class="mt-1 block w-full rounded border-gray-300 shadow-sm">
                    <option value="a">A</option>
                    <option value="b">B</option>
                    <option value="c">C</option>
                    <option value="d">D</option>
                </select>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Paket (opsional)</label>
                <select name="paket_id" class="mt-1 block w-full rounded border-gray-300 shadow-sm">
                    <option value="">-- Tidak ada --</option>
                    @foreach($pakets as $paket)
                        <option value="{{ $paket->id }}">{{ $paket->nama_paket }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit"
                class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">Simpan Soal</button>
        </form>
    </div>
@endsection