<x-header />
<x-navbar />

<div class="bg-gray-50 min-h-screen py-6 px-4">

    <!-- Tab Navigasi -->
    <div class="flex justify-center mb-6 border-b border-gray-200">
        <a href="{{ route('user.paket') }}" 
           class="px-6 py-2 font-semibold text-gray-500 hover:text-blue-600">
            Beli
        </a>
        <a href="{{ route('user.kerjakan') }}" 
           class="px-6 py-2 font-semibold text-blue-900 border-b-2 border-blue-900">
            Kerjakan
        </a>
    </div>

    <!-- Kartu TryOut -->
    <div class="space-y-6">
        @forelse($transaksis as $transaksi)
        <div class="bg-white rounded-xl shadow-md p-5 border border-gray-100">
            <div class="flex justify-between items-center mb-3">
                <h2 class="text-lg font-semibold text-gray-800">{{ $transaksi->paket->nama_paket }}</h2>
                <span class="text-yellow-500 font-semibold">Premium</span>
            </div>

            <p class="text-sm text-gray-600 mb-1">{{ $transaksi->paket->deskripsi }}</p>
            <p class="text-sm text-gray-600 mb-3">
                Dibeli pada: <span class="font-semibold text-gray-800">{{ $transaksi->tanggal_transaksi ? $transaksi->tanggal_transaksi->format('d/m/Y') : $transaksi->created_at->format('d/m/Y') }}</span>
            </p>

            @php
                $totalSoal = $transaksi->paket->soals->count();
                $jawabanUser = \App\Models\JawabanPeserta::where('user_id', auth()->id())
                    ->whereHas('soal.mapel', function($q) use ($transaksi) {
                        $q->where('paket_id', $transaksi->paket_id);
                    })->count();
                $progress = $totalSoal > 0 ? ($jawabanUser / $totalSoal) * 100 : 0;
            @endphp

            <div class="mb-3">
                <p class="text-sm text-gray-600 mb-1">Progress:</p>
                <div class="w-full bg-gray-200 rounded-full h-3">
                    <div class="bg-{{ $progress == 100 ? 'gray' : 'red' }}-600 h-3 rounded-full" style="width: {{ $progress }}%;"></div>
                </div>
                <p class="text-right text-xs text-gray-500 mt-1">{{ round($progress) }}%</p>
            </div>

            @if($progress < 100)
                <a href="{{ route('user.tryout.start', $transaksi->paket) }}" class="w-full bg-blue-900 text-white py-2 rounded-lg font-medium hover:bg-blue-800 transition text-center block">
                    Mulai TryOut
                </a>
            @else
                <a href="{{ route('user.hasil.show', $transaksi->paket) }}" class="w-full bg-green-600 text-white py-2 rounded-lg font-medium hover:bg-green-700 transition text-center block">
                    Lihat Hasil
                </a>
            @endif
        </div>
        @empty
        <div class="bg-white rounded-xl shadow-md p-5 border border-gray-100 text-center">
            <p class="text-gray-500">Belum ada paket yang dibeli. <a href="{{ route('user.paket') }}" class="text-blue-600 hover:text-blue-800">Beli paket sekarang</a></p>
        </div>
        @endforelse
    </div>
</div>
