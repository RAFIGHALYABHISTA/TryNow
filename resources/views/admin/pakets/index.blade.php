@extends('admin.layout')

@section('title', 'Manajemen Paket')

@section('content')
    <h1 class="text-2xl font-bold mb-6">Manajemen Paket</h1>

    <div class="mb-4">
        <a href="{{ route('admin.pakets.create') }}" class="bg-[#001F54] text-white px-4 py-2 rounded hover:bg-blue-700 transition">+ Tambah Paket</a>
    </div>

    <div class="overflow-x-auto bg-white rounded shadow">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nama Paket</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Deskripsi</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Harga</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($pakets as $paket)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $paket->nama_paket }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ \Illuminate\Support\Str::limit($paket->deskripsi, 80) }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">Rp {{ number_format($paket->harga, 2, ',', '.') }}</td>
                        <td class="px-6 py-4 whitespace-nowrap space-x-2">
                            <a href="{{ route('admin.pakets.edit', $paket) }}" class="text-blue-500 hover:underline">Edit</a>
                            <form action="{{ route('admin.pakets.destroy', $paket) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:underline" onclick="return confirm('Hapus paket ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection