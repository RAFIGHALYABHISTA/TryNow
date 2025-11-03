<x-header/>
<x-navbar/>

@if(session('success'))
<div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
    <span class="block sm:inline">{{ session('success') }}</span>
</div>
@endif

<div class="min-h-screen bg-gray-50">

    <!-- Header Profil -->
    <div class="bg-blue-900 text-white relative pb-24">
        <div class="max-w-4xl mx-auto px-6 py-10 flex flex-col items-center text-center">
            <img src="https://placehold.co/100x100" alt="Avatar" 
                class="w-24 h-24 rounded-full ring-4 ring-white shadow-md object-cover mb-4">
            <h2 class="text-2xl font-semibold flex items-center gap-2">
                {{ $user->name }}
                <span class="bg-yellow-500 text-white text-xs px-2 py-1 rounded-full">Premium 👑</span>
            </h2>
            <p class="text-yellow-300 mt-1">Kelas 12</p>
        </div>
    </div>

    <!-- Konten Profil -->
    <div class="max-w-4xl mx-auto -mt-12 space-y-6 px-6 pb-10 relative z-10">

        <!-- Statistik -->
        <div class="bg-white rounded-xl shadow p-6">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Statistik</h3>
            <div class="flex flex-col sm:flex-row justify-around items-center gap-6 sm:gap-0 text-center">
                <div class="flex flex-col items-center">
                    <p class="text-gray-500 text-sm">Tryout Dikerjakan</p>
                    <p class="text-3xl font-bold text-blue-900 mt-1">{{ $completedTryouts }}</p>
                </div>

                <div class="hidden sm:block w-px h-10 bg-gray-200"></div>

                <div class="flex flex-col items-center">
                    <p class="text-gray-500 text-sm">Skor Rata-rata</p>
                    <p class="text-3xl font-bold text-blue-900 mt-1">{{ $averageScore }}</p>
                </div>
            </div>
        </div>

        <!-- Achievement -->
        <div class="bg-white rounded-xl shadow p-6">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Achievement</h3>
            <div class="grid grid-cols-2 sm:grid-cols-5 gap-6 justify-items-center">
                <img src="https://placehold.co/60x60?text=🏆" class="w-14 h-14">
                <img src="https://placehold.co/60x60?text=⭐" class="w-14 h-14">
                <img src="https://placehold.co/60x60?text=🎯" class="w-14 h-14">
                <img src="https://placehold.co/60x60?text=🏅" class="w-14 h-14">
                <img src="https://placehold.co/60x60?text=📈" class="w-14 h-14">
            </div>
        </div>

        <!-- Paket -->
        <div class="bg-white rounded-xl shadow p-6">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Paket</h3>
            <div class="grid sm:grid-cols-3 gap-y-2 text-sm text-gray-700">
                <p>Status: <span class="font-semibold text-yellow-600">Premium</span></p>
                <p>Berlaku hingga: <span class="font-semibold">20/12/2025</span></p>
                <p>Jumlah Paket: <span class="font-semibold">1</span></p>
            </div>
            <button class="mt-4 w-full sm:w-auto bg-blue-900 text-white px-6 py-2 rounded-lg hover:bg-blue-800 transition">
                Tambah Paket
            </button>
        </div>

        <!-- Profile Info -->
        <div class="bg-white rounded-xl shadow p-6">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Profile Info</h3>
            <div class="grid sm:grid-cols-2 gap-y-3 text-gray-700 text-sm">
                <p><span class="font-semibold">Nama Lengkap:</span> {{ $user->name }}</p>
                <p><span class="font-semibold">Kelas:</span> 12</p>
                <p><span class="font-semibold">No. HP:</span> -</p>
                <p><span class="font-semibold">Email:</span> {{ $user->email }}</p>
                <p><span class="font-semibold">Password:</span> *******</p>
            </div>
            <button class="mt-4 bg-blue-900 text-white px-5 py-2 rounded-lg hover:bg-blue-800 transition" onclick="openEditModal()">
                Edit
            </button>
        </div>

        <!-- Pengaturan -->
        <div class="bg-white rounded-xl shadow p-6">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Pengaturan</h3>
            <div class="grid sm:grid-cols-2 gap-y-3 text-gray-700 text-sm">
                <p>Notifikasi: <span class="font-semibold">Aktif</span></p>
                <p>Bahasa: <span class="font-semibold">Bahasa Indonesia</span></p>
            </div>
        </div>

        <!-- Tentang & Bantuan -->
        <div class="bg-white rounded-xl shadow p-6">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Tentang dan Bantuan</h3>
            <ul class="space-y-2 text-sm text-gray-700">
                <li class="flex justify-between items-center cursor-pointer hover:bg-gray-50 px-2 py-1 rounded">
                    <span>FAQ</span> <i class="ri-arrow-right-s-line text-lg"></i>
                </li>
                <li class="flex justify-between items-center cursor-pointer hover:bg-gray-50 px-2 py-1 rounded">
                    <span>Hubungi Admin</span> <i class="ri-arrow-right-s-line text-lg"></i>
                </li>
                <li class="flex justify-between items-center text-gray-500 text-sm">
                    <span>Versi</span> <span>1.0.0</span>
                </li>
            </ul>
        </div>

        <!-- Logout -->
        <div class="bg-white rounded-xl shadow p-4 flex items-center text-red-600 font-semibold hover:bg-red-50 cursor-pointer transition" onclick="logout()">
            <i class="ri-logout-box-r-line text-xl mr-2"></i> Keluar
        </div>
    </div>
</div>

<!-- Ikon -->
<link href="https://cdn.jsdelivr.net/npm/remixicon@4.0.0/fonts/remixicon.css" rel="stylesheet">

<!-- Edit Profile Modal -->
<div id="editModal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 flex items-center justify-center">
    <div class="bg-white rounded-xl p-6 w-full max-w-md mx-4">
        <h3 class="text-xl font-semibold text-gray-800 mb-4">Edit Profile</h3>
        <form id="editForm" method="POST" action="{{ route('user.profile.update') }}">
            @csrf
            @method('PUT')
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                    <input type="text" name="name" value="{{ $user->name }}" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                    <input type="email" name="email" value="{{ $user->email }}" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Password Baru (Opsional)</label>
                    <input type="password" name="password" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="Kosongkan jika tidak ingin mengubah">
                </div>
            </div>
            <div class="flex gap-3 mt-6">
                <button type="button" onclick="closeEditModal()" class="flex-1 px-4 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition">Batal</button>
                <button type="submit" class="flex-1 px-4 py-2 bg-blue-900 text-white rounded-lg hover:bg-blue-800 transition">Simpan</button>
            </div>
        </form>
    </div>
</div>

<script>
function openEditModal() {
    document.getElementById('editModal').classList.remove('hidden');
}

function closeEditModal() {
    document.getElementById('editModal').classList.add('hidden');
}

function logout() {
    if (confirm('Apakah Anda yakin ingin keluar?')) {
        window.location.href = '{{ route("logout") }}';
    }
}

// Close modal when clicking outside
document.getElementById('editModal').addEventListener('click', function(e) {
    if (e.target === this) {
        closeEditModal();
    }
});
</script>
