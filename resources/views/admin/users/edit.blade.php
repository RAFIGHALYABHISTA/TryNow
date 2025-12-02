@extends('admin.layout')

@section('title', 'Edit Role User')

@section('content')
    <h1 class="text-2xl font-bold mb-6">Edit Role User</h1>

    <div class="bg-white p-6 rounded shadow max-w-xl">
        <form action="{{ route('admin.users.updateRole', $user->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Nama</label>
                <input type="text" value="{{ $user->name }}" disabled
                    class="mt-1 block w-full rounded border-gray-300 shadow-sm bg-gray-100 text-gray-600">
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" value="{{ $user->email }}" disabled
                    class="mt-1 block w-full rounded border-gray-300 shadow-sm bg-gray-100 text-gray-600">
            </div>

            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700">Role</label>
                <select name="role" class="mt-1 block w-full rounded border-gray-300 shadow-sm">
                    <option value="user" {{ $user->role === 'user' ? 'selected' : '' }}>User</option>
                    <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                </select>
            </div>

            <button type="submit"
                class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">Simpan Perubahan</button>
        </form>
    </div>
@endsection