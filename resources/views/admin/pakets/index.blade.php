@extends('admin.layout')

@section('title', 'Manajemen Paket')

@section('content')
    <h1 class="text-2xl font-bold mb-6">Manajemen Paket</h1>

    <div class="mb-4">
        <a href="{{ route('admin.pakets.create') }}"
           class="bg-[#001F54] text-white px-4 py-2 rounded hover:bg-blue-700 transition">
            + Tambah Paket
        </a>
    </div>

    <div class="overflow-x-auto bg-white rounded shadow">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nama Paket</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Kategori</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Jumlah Soal</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                {{-- Contoh data statis --}}
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">Paket UTBK 2025</td>
                    <td class="px-6 py-4 whitespace-nowrap">TPS</td>
                    <td class="px-6 py-4 whitespace-nowrap">40</td>
                    <td class="px-6 py-4 whitespace-nowrap space-x-2">
                        <a href="#" class="text-blue-500 hover:underline">Edit</a>
                        <a href="#" class="text-red-500 hover:underline">Hapus</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection