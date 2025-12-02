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

            <form id="tryoutForm" method="POST" action="{{ route('user.tryout.submit', $paket) }}">
                @csrf
                <div id="questionContainer">
                    @foreach($soals as $index => $soal)
                        <div class="question-card mb-8 p-6 border border-gray-200 rounded-lg bg-gray-50" data-index="{{ $index }}" @if($index !== 0) style="display:none;" @endif>
                            <h3 class="text-lg font-semibold text-gray-800 mb-4">{{ $index + 1 }}. {{ $soal->pertanyaan }}</h3>

                            <div class="space-y-3">
                                <label class="flex items-start space-x-3 p-3 bg-white rounded-lg border hover:bg-blue-50 cursor-pointer transition">
                                    <input type="radio" name="answers[{{ $soal->id }}]" value="a" class="mt-1 text-blue-600 focus:ring-blue-500">
                                    <span class="text-gray-700 font-medium">A. {{ $soal->pilihan_a }}</span>
                                </label>
                                <label class="flex items-start space-x-3 p-3 bg-white rounded-lg border hover:bg-blue-50 cursor-pointer transition">
                                    <input type="radio" name="answers[{{ $soal->id }}]" value="b" class="mt-1 text-blue-600 focus:ring-blue-500">
                                    <span class="text-gray-700 font-medium">B. {{ $soal->pilihan_b }}</span>
                                </label>
                                <label class="flex items-start space-x-3 p-3 bg-white rounded-lg border hover:bg-blue-50 cursor-pointer transition">
                                    <input type="radio" name="answers[{{ $soal->id }}]" value="c" class="mt-1 text-blue-600 focus:ring-blue-500">
                                    <span class="text-gray-700 font-medium">C. {{ $soal->pilihan_c }}</span>
                                </label>
                                <label class="flex items-start space-x-3 p-3 bg-white rounded-lg border hover:bg-blue-50 cursor-pointer transition">
                                    <input type="radio" name="answers[{{ $soal->id }}]" value="d" class="mt-1 text-blue-600 focus:ring-blue-500">
                                    <span class="text-gray-700 font-medium">D. {{ $soal->pilihan_d }}</span>
                                </label>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="flex items-center justify-between mt-4">
                    <div class="text-sm text-gray-600">Soal <span id="currentIndex">1</span> / {{ $soals->count() }}</div>

                    <div class="flex items-center gap-3">
                        <button type="button" id="prevBtn" class="px-4 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300" disabled>Previous</button>
                        <button type="button" id="nextBtn" class="px-4 py-2 bg-blue-700 text-white rounded hover:bg-blue-600">Next</button>
                        <button type="submit" id="finishBtn" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-500" style="display:none;">Selesai & Lihat Hasil</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

        <script>
            (function(){
                const total = {{ $soals->count() }};
                let idx = 0;
                const prevBtn = document.getElementById('prevBtn');
                const nextBtn = document.getElementById('nextBtn');
                const finishBtn = document.getElementById('finishBtn');
                const currentIndex = document.getElementById('currentIndex');

                function showQuestion(newIdx) {
                    const cards = document.querySelectorAll('.question-card');
                    cards.forEach((c, i) => {
                        c.style.display = (i === newIdx) ? 'block' : 'none';
                    });
                    idx = newIdx;
                    currentIndex.textContent = idx + 1;
                    prevBtn.disabled = idx === 0;

                    if (idx === total - 1) {
                        nextBtn.style.display = 'none';
                        finishBtn.style.display = 'inline-block';
                    } else {
                        nextBtn.style.display = 'inline-block';
                        finishBtn.style.display = 'none';
                    }
                }

                prevBtn.addEventListener('click', () => {
                    if (idx > 0) showQuestion(idx - 1);
                });

                nextBtn.addEventListener('click', () => {
                    if (idx < total - 1) showQuestion(idx + 1);
                });

                // Allow submit via Finish button
                finishBtn.addEventListener('click', () => {
                    document.getElementById('tryoutForm').submit();
                });

                // keyboard left/right navigation
                document.addEventListener('keydown', (e) => {
                    if (e.key === 'ArrowRight') nextBtn.click();
                    if (e.key === 'ArrowLeft') prevBtn.click();
                });
            })();
        </script>
