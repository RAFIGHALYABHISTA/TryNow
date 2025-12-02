<nav class="bg-[#001F54] shadow px-4 py-3 flex justify-between items-center">
    <div class="flex items-center gap-3">
        <button id="adminMenuToggle" class="md:hidden text-white p-2 rounded hover:bg-white/10 focus:outline-none" aria-label="Toggle menu">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" /></svg>
        </button>
        <div class="text-lg text-white font-bold">Admin Panel</div>
    </div>

    <div class="hidden md:flex items-center gap-3">
        @if(auth()->check())
            <div class="text-sm text-white mr-4">Halo, {{ auth()->user()->name }}</div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="text-red-400 bg-white/10 px-3 py-1 rounded hover:bg-white/20 transition">Logout</button>
            </form>
        @else
            <a href="{{ route('auth.login') }}" class="text-white/80 hover:underline">Login</a>
        @endif
    </div>

    <!-- Mobile nav (hidden by default) -->
    <div id="adminMobileNav" class="md:hidden bg-[#f8fafc] text-[#001F54] absolute top-16 left-0 right-0 shadow-md p-4 hidden z-50">
        <ul class="space-y-2">
            <li><a href="{{ route('admin.dashboard') }}" class="block p-2 rounded hover:bg-gray-100">Dashboard</a></li>
            <li><a href="{{ route('admin.users.index') }}" class="block p-2 rounded hover:bg-gray-100">User</a></li>
            <li><a href="{{ route('admin.pakets.index') }}" class="block p-2 rounded hover:bg-gray-100">Paket</a></li>
            <li><a href="{{ route('admin.soals.index') }}" class="block p-2 rounded hover:bg-gray-100">Soal</a></li>
        </ul>
    </div>

    <script>
        document.getElementById('adminMenuToggle').addEventListener('click', function(){
                const menu = document.getElementById('adminMobileNav');
                menu.classList.toggle('hidden');
                // also toggle the sidebar visibility on small screens
                const sidebar = document.getElementById('adminSidebar');
                if (sidebar) sidebar.classList.toggle('hidden');
            });
    </script>
</nav>