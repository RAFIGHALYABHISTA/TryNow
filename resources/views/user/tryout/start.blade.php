<x-header />
<x-navbar />

<div class="bg-gray-50 min-h-screen py-6 px-4">
    <div class="max-w-4xl mx-auto">
        <div class="bg-white rounded-xl shadow-md p-6 border border-gray-100">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-2xl font-bold text-gray-800">{{ $paket->nama_paket }}</h1>
                <div class="text-sm text-gray-600">
                    Soal: {{ $soals->count() }}
                </div>
            </div>

            <form method="POST" action="{{ route('user.tryout.submit', $paket) }}">
                @csrf

                @foreach($soals as $index => $soal)
                <div class="mb-8 p-6 border border-gray-200 rounded-lg bg-gray-50">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">{{ $index + 1 }}. {{ $soal->pertanyaan }}</h3>

                    <div class="space-y-3">
                        <label class="flex items-start space-x-3 p-3 bg-white rounded-lg border hover:bg-blue-50 cursor-pointer transition">
                            <input type="radio" name="answers[{{ $soal->id }}]" value="A" class="mt-1 text-blue-600 focus:ring-blue-500">
                            <span class="text-gray-700 font-medium">A. {{ $soal->pilihan_a }}</span>
                        </label>
                        <label class="flex items-start space-x-3 p-3 bg-white rounded-lg border hover:bg-blue-50 cursor-pointer transition">
                            <input type="radio" name="answers[{{ $soal->id }}]" value="B" class="mt-1 text-blue-600 focus:ring-blue-500">
                            <span class="text-gray-700 font-medium">B. {{ $soal->pilihan_b }}</span>
                        </label>
                        <label class="flex items-start space-x-3 p-3 bg-white rounded-lg border hover:bg-blue-50 cursor-pointer transition">
                            <input type="radio" name="answers[{{ $soal->id }}]" value="C" class="mt-1 text-blue-600 focus:ring-blue-500">
                            <span class="text-gray-700 font-medium">C. {{ $soal->pilihan_c }}</span>
                        </label>
                        <label class="flex items-start space-x-3 p-3 bg-white rounded-lg border hover:bg-blue-50 cursor-pointer transition">
                            <input type="radio" name="answers[{{ $soal->id }}]" value="D" class="mt-1 text-blue-600 focus:ring-blue-500">
                            <span class="text-gray-700 font-medium">D. {{ $soal->pilihan_d }}</span>
                        </label>
                    </div>
                </div>
                @endforeach

                <div class="text-center mt-8">
                    <button type="submit" class="bg-blue-900 text-white px-12 py-4 rounded-lg font-semibold hover:bg-blue-800 transition shadow-lg">
                        Selesai & Lihat Hasil
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
