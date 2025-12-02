@extends('admin.layout')

@section('title', 'TryNow | Dashboard Admin')

@section('content')
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
        <div class="bg-white p-4 rounded shadow flex flex-col justify-between ">
            <div class="flex items-center justify-between">
                <h2 class="text-sm font-semibold text-gray-600">Total Users</h2>
                <span class="text-xs text-gray-400">Users</span>
            </div>
            <p id="totalUsers" class="text-3xl font-bold mt-4 text-blue-900">{{ number_format($totalUsers) }}</p>
        </div>

        <div class="bg-white p-4 rounded shadow flex flex-col justify-between">
            <div class="flex items-center justify-between">
                <h2 class="text-sm font-semibold text-gray-600">Total Paket</h2>
                <span class="text-xs text-gray-400">Paket</span>
            </div>
            <p id="totalPakets" class="text-3xl font-bold mt-4 text-blue-900">{{ number_format($totalPakets) }}</p>
        </div>

        <div class="bg-white p-4 rounded shadow flex flex-col justify-between">
            <div class="flex items-center justify-between">
                <h2 class="text-sm font-semibold text-gray-600">Total Soal</h2>
                <span class="text-xs text-gray-400">Soal</span>
            </div>
            <p id="totalSoals" class="text-3xl font-bold mt-4 text-blue-900">{{ number_format($totalSoals) }}</p>
        </div>

        <div class="bg-white p-4 rounded shadow flex flex-col justify-between">
            <div class="flex items-center justify-between">
                <h2 class="text-sm font-semibold text-gray-600">Transaksi</h2>
                <span class="text-xs text-gray-400">Total</span>
            </div>
            <p id="totalTransactions" class="text-3xl font-bold mt-4 text-blue-900">{{ number_format($totalTransactions) }}</p>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <div class="bg-white p-4 rounded shadow">
            <h3 class="text-lg font-semibold mb-3">Pengguna Terbaru</h3>
            <ul id="recentUsers" class="space-y-3">
                @foreach($recentUsers as $u)
                    <li class="flex items-center justify-between border rounded p-3">
                        <div class="flex items-center gap-3">
                            <div class="w-9 h-9 rounded-full bg-blue-600 text-white flex items-center justify-center font-semibold">{{ strtoupper(substr($u->name,0,1)) }}</div>
                            <div>
                                <div class="font-semibold">{{ $u->name }}</div>
                                <div class="text-xs text-gray-500">{{ $u->email }}</div>
                            </div>
                        </div>
                        <div class="text-xs text-gray-400">{{ $u->created_at->diffForHumans() }}</div>
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="bg-white p-4 rounded shadow">
            <h3 class="text-lg font-semibold mb-3">Transaksi Terakhir</h3>
            <ul id="recentTransactions" class="space-y-3">
                @foreach($recentTransactions as $t)
                    <li class="flex items-center justify-between border rounded p-3">
                        <div>
                            <div class="font-semibold">{{ $t->paket->nama_paket ?? 'Paket Tidak Ditemukan' }}</div>
                            <div class="text-xs text-gray-500">{{ $t->user->name ?? 'User' }} • Rp {{ number_format($t->jumlah,0,',','.') }}</div>
                        </div>
                        <div class="text-xs text-gray-400">{{ $t->created_at->diffForHumans() }}</div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

    <script>
        // Poll the server every 6 seconds and update dashboard
        (function(){
            const endpoint = '{{ route("admin.dashboard.data") }}';
            async function refresh() {
                try {
                    const res = await fetch(endpoint, { credentials: 'same-origin' });
                    if (!res.ok) return;
                    const json = await res.json();
                    document.getElementById('totalUsers').textContent = json.totalUsers.toLocaleString();
                    document.getElementById('totalPakets').textContent = json.totalPakets.toLocaleString();
                    document.getElementById('totalSoals').textContent = json.totalSoals.toLocaleString();
                    document.getElementById('totalTransactions').textContent = json.totalTransactions.toLocaleString();

                    // update recent users
                    const usersEl = document.getElementById('recentUsers');
                    usersEl.innerHTML = '';
                    json.recentUsers.forEach(u => {
                        const el = document.createElement('li');
                        el.className = 'flex items-center justify-between border rounded p-3';
                        el.innerHTML = `<div class="flex items-center gap-3"><div class="w-9 h-9 rounded-full bg-blue-600 text-white flex items-center justify-center font-semibold">${u.name.charAt(0).toUpperCase()}</div><div><div class="font-semibold">${u.name}</div><div class="text-xs text-gray-500">${u.email}</div></div></div><div class="text-xs text-gray-400">${new Date(u.created_at).toLocaleString()}</div>`;
                        usersEl.appendChild(el);
                    });

                    // update recent transactions
                    const transEl = document.getElementById('recentTransactions');
                    transEl.innerHTML = '';
                    json.recentTransactions.forEach(t => {
                        const el = document.createElement('li');
                        el.className = 'flex items-center justify-between border rounded p-3';
                        const paket = t.paket ? t.paket.nama_paket : 'Paket Tidak Ditemukan';
                        const user = t.user ? t.user.name : 'User';
                        el.innerHTML = `<div><div class="font-semibold">${paket}</div><div class="text-xs text-gray-500">${user} • Rp ${Number(t.jumlah).toLocaleString()}</div></div><div class="text-xs text-gray-400">${new Date(t.created_at).toLocaleString()}</div>`;
                        transEl.appendChild(el);
                    });
                } catch (e) {
                    console.debug('Dashboard polling error', e);
                }
            }

            setInterval(refresh, 6000);
        })();
    </script>
@endsection