<!-- Navbar / Header -->
<header class="bg-white border-b border-gray-200 shadow-sm sticky top-0 z-10">
    <div class="container mx-auto px-4 py-4 flex justify-between items-center">
        
        <!-- Logo TryNow -->
        <div class="flex items-center space-x-2">
            <img 
                src="{{ asset('images/logo.png') }}" 
                alt="TryNow Logo" 
                class="w-30 h-30 object-contain absolute"  
            >
        </div>

        <!-- Menu Navigasi -->
        <nav class="hidden md:flex items-center space-x-8 text-gray-700 font-medium text-base">
            <a href="{{ route('user.dashboard') }}" class="{{ request()->routeIs('user.dashboard') ? 'text-blue-900 border-b-2 border-blue-900' : 'hover:text-blue-600' }} transition">Home</a>
            <a href="{{ route('user.paket') }}" class="{{ request()->routeIs('user.paket') || request()->routeIs('user.kerjakan') ? 'text-blue-900 border-b-2 border-blue-900' : 'hover:text-blue-600' }} transition">Paket</a>
            <a href="{{ route('user.result') }}" class="{{ request()->routeIs('user.result') ? 'text-blue-900 border-b-2 border-blue-900' : 'hover:text-blue-600' }} transition">Result</a>
            <a href="{{ route('user.profile') }}" class="{{ request()->routeIs('user.profile') ? 'text-blue-900 border-b-2 border-blue-900' : 'hover:text-blue-600' }} transition">Profile</a>
        </nav>

        <!-- Avatar dan Dropdown -->
        <div class="flex items-center space-x-4">
            <div class="relative group">
                <!-- Avatar Pengguna -->
                <img 
                    src="https://placehold.co/40x40/5c7b94/ffffff?text=A" 
                    alt="Avatar Pengguna" 
                    class="w-10 h-10 rounded-full object-cover cursor-pointer ring-2 ring-blue-500 hover:ring-blue-700 transition duration-150"
                >
                
                <!-- Dropdown -->
                <div class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-xl opacity-0 group-hover:opacity-100 transition duration-300 pointer-events-none group-hover:pointer-events-auto">
                    <div class="p-4">
                        <p class="text-sm font-semibold text-gray-900">Halo, {{ Auth::user()->name }}</p>
                        <form method="POST" action="{{ route('logout') }}" class="mt-2 inline">
                            @csrf
                            <button 
                                type="submit" 
                                class="w-full text-left text-sm text-red-600 hover:text-red-800 hover:bg-red-50 px-2 py-1 rounded transition"
                            >
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
