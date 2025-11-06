@extends('admin.layout')

@section('title', 'Manajemen User')

@section('content')
    <h1 class="text-2xl font-bold mb-6">Manajemen User</h1>

    <div class="overflow-x-auto bg-white rounded shadow">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nama</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Email</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Role</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                {{-- Contoh data statis --}}
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">Budi Santoso</td>
                    <td class="px-6 py-4 whitespace-nowrap">budi@example.com</td>
                    <td class="px-6 py-4 whitespace-nowrap">User</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <a href="#" class="text-blue-500 hover:underline">Edit Role</a>
                    </td>
                </tr>
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">Siti Aminah</td>
                    <td class="px-6 py-4 whitespace-nowrap">siti@example.com</td>
                    <td class="px-6 py-4 whitespace-nowrap">Admin</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <a href="#" class="text-blue-500 hover:underline">Edit Role</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection