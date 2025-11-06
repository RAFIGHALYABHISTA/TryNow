@extends('admin.layout')

@section('title', 'TryNow | Dashboard Admin')

@section('content')
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white p-4 rounded shadow">
            <h2 class="text-lg font-semibold">Total User</h2>
            <p class="text-3xl mt-2">1.245</p>
        </div>
        <div class="bg-white p-4 rounded shadow">
            <h2 class="text-lg font-semibold">TryOut Aktif</h2>
            <p class="text-3xl mt-2">12</p>
        </div>
        <div class="bg-white p-4 rounded shadow">
            <h2 class="text-lg font-semibold">Promo Berjalan</h2>
            <p class="text-3xl mt-2">3</p>
        </div>
    </div>
@endsection