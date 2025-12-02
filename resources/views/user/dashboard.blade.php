<x-header/>
<body class="bg-gray-50 min-h-screen">
    <x-navbar/>

    <main class="container mx-auto px-4 py-8 space-y-10">

        <!-- Banner -->
        <div class="flex justify-center">
            <img 
                src="{{ asset('images/banner.png') }}" 
                alt="Banner TryNow" 
                class="w-full max-w-5xl rounded-xl shadow-lg object-contain"
            >
        </div>

        <!-- Greeting -->
        <p class="text-lg md:text-xl font-semibold text-gray-800 mt-4">
            👋 Hai, <span class="font-bold">{{ Auth::user()->name }}</span>! Siap lanjut TryOut hari ini?
        </p>

        <!-- Icon Navigation -->
        <div class="grid grid-cols-3 gap-4 text-center">

            <a href="#" class="bg-white p-4 md:p-6 rounded-xl shadow-md flex flex-col items-center hover:scale-105 transition">
                <div class="p-3 mb-2">
                    <img src="{{ asset('images/try.png') }}" class="w-8 h-8 md:w-10 md:h-10">
                </div>
                <span class="text-sm font-medium text-gray-700">Tryout</span>
            </a>

            <a href="#" class="bg-white p-4 md:p-6 rounded-xl shadow-md flex flex-col items-center hover:scale-105 transition">
                <div class="p-3 mb-2">
                    <img src="{{ asset('images/ren.png') }}" class="w-8 h-8 md:w-10 md:h-10">
                </div>
                <span class="text-sm font-medium text-gray-700">Achieve</span>
            </a>

            <a href="#" class="bg-white p-4 md:p-6 rounded-xl shadow-md flex flex-col items-center hover:scale-105 transition">
                <div class="p-3 mb-2">
                    <img src="{{ asset('images/had.png') }}" class="w-8 h-8 md:w-10 md:h-10">
                </div>
                <span class="text-sm font-medium text-gray-700">Promo</span>
            </a>

        </div>

        <!-- Rekomendasi Hari Ini -->
        <div class="max-w-4xl mx-auto">
            <h3 class="text-lg font-bold mb-3 text-gray-800">Rekomendasi Hari Ini</h3>

            <div class="bg-white p-5 rounded-xl shadow-lg flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                <div class="flex items-center space-x-4">
                    <div class="p-3 bg-yellow-100 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-yellow-600" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path>
                            <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path>
                        </svg>
                    </div>
                    <p class="text-base text-gray-700">
                        Lihat Pembahasan TryOut UTBK -
                        <span class="font-bold text-yellow-600">Premium</span>
                    </p>
                </div>

                <button class="bg-blue-600 hover:bg-blue-700 text-white font-medium px-5 py-2 rounded-lg shadow-md">
                    Lihat Sekarang
                </button>
            </div>
        </div>

        <!-- Score Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 max-w-5xl mx-auto">

            <div class="bg-white p-6 rounded-xl shadow text-center border border-gray-100">
                <p class="text-3xl md:text-4xl font-extrabold text-gray-900">755,45</p>
                <p class="text-sm text-gray-500 mt-1">Skor Terakhir</p>
            </div>

            <div class="bg-white p-6 rounded-xl shadow text-center border border-gray-100">
                <p class="text-3xl md:text-4xl font-extrabold text-green-600">825,45</p>
                <p class="text-sm text-gray-500 mt-1">Skor Tertinggi</p>
            </div>

            <div class="bg-white p-6 rounded-xl shadow text-center border border-gray-100">
                <p class="text-3xl md:text-4xl font-extrabold text-yellow-600">Premium</p>
                <p class="text-sm text-gray-500 mt-1">Paket Aktif</p>
            </div>

        </div>

        <!-- Motivational Quote -->
        <div class="max-w-5xl mx-auto bg-white p-6 rounded-xl shadow-lg flex items-center gap-4 border-l-4 border-blue-600">
            <img src="https://placehold.co/40x40/f97316/ffffff?text=M" 
                 class="w-10 h-10 rounded-full hidden sm:block">
            <p class="text-lg md:text-xl italic text-gray-700">
                "Kamu tidak perlu sempurna, cukup 
                <span class="font-bold text-blue-600">konsisten setiap hari</span> 🙌"
            </p>
        </div>

    </main>

</body>
</html>
