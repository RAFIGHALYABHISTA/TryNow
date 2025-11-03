<x-header/>
<x-navbar/>
<div class="bg-gray-50 min-h-screen py-6 px-4">

      <!-- Tab Navigasi -->
    <div class="flex justify-center mb-6 border-b border-gray-200">
        <a href="{{ route('user.paket') }}"
           class="px-6 py-2 font-semibold text-blue-900 border-b-2 border-blue-900">
            Beli
        </a>
        <a href="{{ route('user.kerjakan') }}"
           class="px-6 py-2 font-semibold text-gray-500 hover:text-blue-600">
            Kerjakan
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
            {{ session('success') }}
        </div>
    @endif


    <!-- Kartu Paket -->
    <div class="space-y-6">
        @foreach($pakets as $paket)
        <div class="bg-white rounded-xl shadow-md p-5 border border-gray-100">
            <div class="flex justify-between items-center mb-3">
                <h2 class="text-lg font-semibold text-gray-800">{{ $paket->nama_paket }}</h2>
                <span class="text-yellow-500 font-semibold">Premium</span>
            </div>

            <p class="text-sm text-gray-500 mb-4">{{ $paket->deskripsi }}</p>

            <div class="grid grid-cols-2 gap-2 text-sm text-gray-700 mb-4">
                <ul class="space-y-1">
                    <li class="flex items-start space-x-2"><span class="text-green-500 text-lg">✔</span> lorem ipsum ajwdmkaw kmdkamemdmk</li>
                    <li class="flex items-start space-x-2"><span class="text-green-500 text-lg">✔</span> wdneemkmsk kfmskmkmekmk</li>
                    <li class="flex items-start space-x-2"><span class="text-green-500 text-lg">✔</span> me kmdk kfsek</li>
                </ul>
                <ul class="space-y-1">
                    <li class="flex items-start space-x-2"><span class="text-green-500 text-lg">✔</span> lorem ipsum ajwdmkaw wdneemkmsk</li>
                    <li class="flex items-start space-x-2"><span class="text-green-500 text-lg">✔</span> sekfkmekmdk me kmdk kfsek</li>
                    <li class="flex items-start space-x-2"><span class="text-green-500 text-lg">✔</span> lorem ipsum FSEFESF EFSEFSE</li>
                </ul>
            </div>

            <div class="flex items-center space-x-2 mb-4">
                <p class="text-sm line-through text-gray-400">Rp {{ number_format($paket->harga + 40000, 0, ',', '.') }}</p>
                <p class="text-red-600 font-semibold">Rp {{ number_format($paket->harga, 0, ',', '.') }}</p>
            </div>

            <form method="POST" action="{{ route('user.paket.beli', $paket) }}" class="w-full">
                @csrf
                <button type="submit" class="w-full bg-blue-900 text-white py-2 rounded-lg font-medium hover:bg-blue-800 transition">
                    Tambah Paket
                </button>
            </form>
        </div>
        @endforeach
    </div>
</div>
