@extends('admin.layout')

@section('title', 'Manajemen Soal')

@section('content')
    <h1 class="text-2xl font-bold mb-6">Manajemen Soal</h1>

    <div class="mb-4">
        <a href="{{ route('admin.soals.create') }}" class="bg-[#001F54] text-white px-4 py-2 rounded hover:bg-blue-700 transition">+ Tambah Soal</a>
    </div>

    <div class="overflow-x-auto bg-white rounded shadow">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Pertanyaan</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Mapel</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Paket</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($soals as $soal)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">{{ \Illuminate\Support\Str::limit($soal->pertanyaan, 80) }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $soal->mapel->nama_mapel ?? '-' }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $soal->pakets->pluck('nama_paket')->join(', ') }}</td>
                        <td class="px-6 py-4 whitespace-nowrap space-x-2">
                            <a href="{{ route('admin.soals.edit', $soal) }}" class="text-blue-500 hover:underline">Edit</a>
                            <form action="{{ route('admin.soals.destroy', $soal) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:underline" onclick="return confirm('Hapus soal ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection