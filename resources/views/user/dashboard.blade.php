<x-header/>
<body class="bg-gray-50 min-h-screen">
    <x-navbar/>
       <!-- Main Content -->
    <main class="container mx-auto px-4 py-8">
        <!-- Struktur Utama mengikuti desain visual -->
        <div class="space-y-8">
            <div class="flex justify-center">
                    <img 
                        src="{{ asset('images/banner.png') }}" 
                        alt="Banner TryNow" 
                        class="w-full h-auto max-w-5xl object-contain mx-auto rounded-xl shadow-lg"
                    >
                </div>

            </div>

            <!-- 2. Greeting dan Navigasi Ikon -->
            <div>
                <p class="text-lg font-semibold text-gray-800 mb-6">
                    👋 Hai, <span class="font-bold">{{ Auth::user()->name }}</span>! Siap lanjut TryOut hari ini?
                </p>

                <!-- Ikon Navigasi (Disesuaikan dengan desain gambar) -->
                <div class="grid grid-cols-3 gap-4 text-center">
                    
                    <!-- Card Tryout -->
                    <a href="#" class="icon-card bg-white p-4 md:p-6 rounded-xl shadow-md flex flex-col items-center hover:bg-blue-50">
                        <div class="p-3 mb-2 bg-red-100 rounded-2xl">
                            <img src="{{ asset('images/try.png') }}" alt="">
                        </div>
                        <span class="text-sm font-medium text-gray-700">Tryout</span>
                    </a>

                    <!-- Card Achieve -->
                    <a href="#" class="icon-card bg-white p-4 md:p-6 rounded-xl shadow-md flex flex-col items-center hover:bg-yellow-50">
                        <div class="p-3 mb-2 bg-yellow-100 rounded-2xl">
                            <img src="{{ asset('images/ren.png') }}" alt="">
                        </div>
                        <span class="text-sm font-medium text-gray-700">Achieve</span>
                    </a>

                    <!-- Card Promo -->
                    <a href="#" class="icon-card bg-white p-4 md:p-6 rounded-xl shadow-md flex flex-col items-center hover:bg-green-50">
                        <div class="p-3 mb-2 bg-green-100 rounded-2xl">
                            <img src="{{ asset('images/had.png') }}" alt="">
                        </div>
                        <span class="text-sm font-medium text-gray-700">Promo</span>
                    </a>
                </div>
            </div>
            
            <!-- 3. Rekomendasi Hari Ini -->
            <div>
                <h3 class="text-lg font-bold mb-3 text-gray-800">Rekomendasi hari ini</h3>

                <div class="bg-white p-4 rounded-xl shadow-lg flex flex-col md:flex-row items-center justify-between border-2 border-yellow-500">
                    <div class="flex items-center space-x-4 mb-4 md:mb-0">
                        <!-- Icon Buku -->
                        <div class="p-3 bg-yellow-100 rounded-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-yellow-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path></svg>
                        </div>
                        <p class="text-base text-gray-700">Lihat Pembahasan TryOut UTBK - <span class="font-bold text-yellow-600">Premium</span></p>
                    </div>
                    <button class="bg-blue-600 hover:bg-blue-700 text-white font-medium px-4 py-2 rounded-lg transition duration-150 shadow-md w-full md:w-auto">
                        Lihat Sekarang
                    </button>
                </div>
            </div>

            <!-- 4. Score Cards -->
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                
                <!-- Skor Terakhir -->
                <div class="bg-white p-6 rounded-xl shadow-lg text-center border border-gray-100">
                    <p class="text-4xl font-extrabold text-gray-900 mb-1">755,45</p>
                    <p class="text-sm text-gray-500">Skor Terakhir</p>
                </div>

                <!-- Skor Tertinggi -->
                <div class="bg-white p-6 rounded-xl shadow-lg text-center border border-gray-100">
                    <p class="text-4xl font-extrabold text-green-600 mb-1">825,45</p>
                    <p class="text-sm text-gray-500">Skor Tertinggi</p>
                </div>

                <!-- Paket Aktif -->
                <div class="bg-white p-6 rounded-xl shadow-lg text-center border-2 border-yellow-500">
                    <p class="text-4xl font-extrabold text-yellow-600 mb-1">Premium</p>
                    <p class="text-sm text-gray-500">Paket Aktif</p>
                </div>
            </div>

            <!-- 5. Motivational Quote Card -->
            <div class="bg-white p-6 rounded-xl shadow-lg flex items-center space-x-4 border-l-4 border-blue-600">
                <img src="https://placehold.co/40x40/f97316/ffffff?text=M" alt="Motivator" class="w-10 h-10 rounded-full object-cover hidden sm:block">
                <p class="text-lg italic text-gray-700">
                    "Kamu tidak perlu sempurna, cukup <span class="font-bold text-blue-600">konsisten setiap hari</span> 🙌"
                </p>
            </div>

        </div>
    </main>

</body>
</html>
