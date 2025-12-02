<x-header/>
<x-navbar/>
<div class="min-h-screen bg-gray-50 pb-24 px-4 pt-6">
    <h1 class="text-2xl font-bold text-gray-900 mb-6">Result</h1>

    <div class="space-y-6">
        @forelse($transaksis->where('status', 'completed') as $transaksi)
        <div class="bg-white rounded-xl shadow p-5">
            <div class="mb-2">
                <h2 class="text-lg font-semibold text-gray-800">
                    {{ $transaksi->paket->nama_paket }} - <span class="text-yellow-500">Premium</span>
                </h2>
                <p class="text-sm text-gray-500">Selesai Tanggal: {{ $transaksi->updated_at->format('d/m/Y') }}</p>
            </div>

            @php
                $jawabanPesertas = \App\Models\JawabanPeserta::where('user_id', auth()->id())
                    ->whereHas('soal.mapel', function($q) use ($transaksi) {
                        $q->where('paket_id', $transaksi->paket_id);
                    })->get();
                $score = $jawabanPesertas->where('is_benar', true)->count();
                $total = $jawabanPesertas->count();
                $percentage = $total > 0 ? round(($score / $total) * 100, 2) : 0;
            @endphp

            <div class="mt-3">
                <p class="text-sm text-gray-600">Total skor</p>
                <h3 class="text-4xl font-bold text-blue-900">{{ $percentage }}</h3>
                <p class="text-sm text-gray-500">Waktu Pengerjaan: - menit</p>
            </div>

            <!-- TPS -->
            <div class="mt-4 bg-gray-50 rounded-lg p-3">
                <div class="flex justify-between mb-2">
                    <p class="font-semibold text-gray-700">TPS (Tes Potensi Skolastik)</p>
                    <p class="font-bold text-blue-900">{{ $score }} / {{ $total }}</p>
                </div>
                <ul class="text-sm text-gray-700 space-y-1">
                    <li>Jumlah Benar: {{ $score }}</li>
                    <li>Jumlah Salah: {{ $total - $score }}</li>
                </ul>
            </div>

            <div class="flex space-x-3 mt-4">
                <a href="{{ route('user.hasil.show', $transaksi->paket) }}" class="flex-1 bg-blue-900 text-white py-2 rounded-lg font-medium hover:bg-blue-800 transition text-center">
                    Lihat Pembahasan
                </a>
                <button class="flex-1 bg-gray-500 text-white py-2 rounded-lg font-medium hover:bg-gray-600 transition">
                    Bagi Hasil
                </button>
            </div>
        </div>
        @empty
        <div class="bg-white rounded-xl shadow p-5 text-center">
            <p class="text-gray-500">Belum ada hasil tryout yang tersedia.</p>
        </div>
        @endforelse
    </div>
</div>
