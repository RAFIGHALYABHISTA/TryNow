<x-header />
<x-navbar />

<div class="bg-gray-50 min-h-screen py-6 px-4">
    <div class="max-w-4xl mx-auto">
        <div class="bg-white rounded-xl shadow-md p-6 border border-gray-100">
            <h1 class="text-2xl font-bold text-gray-800 mb-6">Hasil TryOut - {{ $paket->nama_paket }}</h1>

            <div class="bg-gradient-to-r from-blue-50 to-indigo-50 p-6 rounded-xl mb-8 border border-blue-200">
                <h2 class="text-xl font-semibold text-blue-800 mb-3">Skor Akhir</h2>
                <p class="text-4xl font-bold text-blue-900 mb-2">{{ $score }}/{{ $total }}</p>
                <p class="text-lg text-blue-700 font-medium">{{ $percentage }}% - {{ $percentage >= 70 ? 'Lulus' : 'Perlu Ditingkatkan' }}</p>
            </div>

            <div class="space-y-6">
                <h3 class="text-xl font-semibold text-gray-800 mb-4">Detail Jawaban</h3>

                @foreach($jawabanPesertas as $index => $jawaban)
                <div class="border border-gray-200 rounded-xl p-6 {{ $jawaban->is_benar ? 'bg-green-50 border-green-200' : 'bg-red-50 border-red-200' }}">
                    <div class="flex items-start justify-between mb-4">
                        <h4 class="font-semibold text-gray-800 text-lg">{{ $index + 1 }}. {{ $jawaban->soal->pertanyaan }}</h4>
                        <span class="px-3 py-1 rounded-full text-sm font-medium {{ $jawaban->is_benar ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                            {{ $jawaban->is_benar ? 'Benar' : 'Salah' }}
                        </span>
                    </div>

                    <div class="grid md:grid-cols-2 gap-6">
                        <div class="bg-white p-4 rounded-lg border">
                            <p class="text-sm font-medium text-gray-600 mb-2">Jawaban Anda:</p>
                            <p class="font-semibold {{ $jawaban->is_benar ? 'text-green-700' : 'text-red-700' }}">
                                {{ $jawaban->jawaban }}. {{ $jawaban->soal->{'pilihan_' . strtolower($jawaban->jawaban)} }}
                            </p>
                        </div>

                        <div class="bg-white p-4 rounded-lg border">
                            <p class="text-sm font-medium text-gray-600 mb-2">Jawaban Benar:</p>
                            <p class="font-semibold text-green-700">
                                {{ $jawaban->soal->jawaban_benar }}. {{ $jawaban->soal->{'pilihan_' . strtolower($jawaban->soal->jawaban_benar)} }}
                            </p>
                        </div>
                    </div>

                    @if(!$jawaban->is_benar)
                    <div class="mt-4 bg-yellow-50 p-4 rounded-lg border border-yellow-200">
                        <p class="text-sm font-medium text-yellow-800 mb-1">Pembahasan:</p>
                        <p class="text-sm text-yellow-700">Jawaban yang benar adalah {{ $jawaban->soal->jawaban_benar }} karena merupakan hasil yang tepat dari perhitungan matematika.</p>
                    </div>
                    @endif
                </div>
                @endforeach
            </div>

            <div class="text-center mt-8">
                <a href="{{ route('user.kerjakan') }}" class="bg-blue-900 text-white px-8 py-3 rounded-lg font-semibold hover:bg-blue-800 transition shadow-lg">
                    Kembali ke Kerjakan
                </a>
            </div>
        </div>
    </div>
</div>
