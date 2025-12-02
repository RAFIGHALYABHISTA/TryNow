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
                @foreach($users as $user)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $user->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $user->email }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ ucfirst($user->role) }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center gap-2">
                            <form action="{{ route('admin.users.updateRole', $user) }}" method="POST" class="inline-flex items-center gap-2">
                                @csrf
                                @method('PUT')
                                <select name="role" class="px-2 py-1 border rounded text-sm">
                                    <option value="user" @if($user->role == 'user') selected @endif>User</option>
                                    <option value="premium" @if($user->role == 'premium') selected @endif>Premium</option>
                                </select>
                                <button type="submit" class="text-blue-500 hover:underline text-sm">Update</button>
                            </form>
                            @if(auth()->id() !== $user->id && $user->role !== 'admin')
                                <form action="{{ route('admin.users.destroy', $user) }}" method="POST" onsubmit="return confirm('Hapus user ini? Semua data terkait juga akan dihapus.');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:underline text-sm">Hapus</button>
                                </form>
                            @endif
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection