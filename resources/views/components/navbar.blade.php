<!-- Navbar / Header -->
<header class="bg-white border-b border-gray-200 shadow-sm sticky top-0 z-20" x-data="{ open: false }">
    <div class="container mx-auto px-4 py-4 flex justify-between items-center">

        <!-- Logo -->
        <div class="flex items-center space-x-2">
            <img src="{{ asset('images/logo.png') }}" alt="TryNow Logo" class="w-8 h-8 md:w-12 md:h-12 object-contain">
        </div>

        <!-- Hamburger Menu -->
        <button @click="open = !open" class="md:hidden text-gray-700 focus:outline-none transition">
            <svg x-show="!open" class="w-7 h-7" fill="none" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
            </svg>

            <svg x-show="open" x-cloak class="w-7 h-7" fill="none" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>

        <!-- Desktop Menu -->
        <nav class="hidden md:flex items-center space-x-8 text-gray-700 font-medium text-base">
            <a href="{{ route('user.dashboard') }}" class="{{ request()->routeIs('user.dashboard') ? 'text-blue-900 border-b-2 border-blue-900' : 'hover:text-blue-600' }}">Home</a>
            <a href="{{ route('user.paket') }}" class="{{ request()->routeIs('user.paket') || request()->routeIs('user.kerjakan') ? 'text-blue-900 border-b-2 border-blue-900' : 'hover:text-blue-600' }}">Paket</a>
            <a href="{{ route('user.result') }}" class="{{ request()->routeIs('user.result') ? 'text-blue-900 border-b-2 border-blue-900' : 'hover:text-blue-600' }}">Result</a>
            <a href="{{ route('user.profile') }}" class="{{ request()->routeIs('user.profile') ? 'text-blue-900 border-b-2 border-blue-900' : 'hover:text-blue-600' }}">Profile</a>
        </nav>

        <!-- Avatar Desktop -->
        <div class="hidden md:flex items-center space-x-4">
            <div class="relative group">
                @if(Auth::check())
                    @php
                        $nameParts = preg_split('/\s+/', trim(Auth::user()->name));
                        $initials = strtoupper(substr($nameParts[0],0,1) . (isset($nameParts[1]) ? substr($nameParts[1],0,1) : ''));
                    @endphp

                    <div class="w-10 h-10 rounded-full inline-flex items-center justify-center text-white font-semibold cursor-pointer ring-2 ring-blue-500 bg-gradient-to-br from-blue-600 to-indigo-700 relative">
                        <span>{{ $initials }}</span>
                        <span class="absolute -bottom-0.5 -right-0.5 w-2.5 h-2.5 bg-green-400 rounded-full ring-1 ring-white"></span>
                    </div>
                @else
                    <a href="{{ route('auth.login') }}" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Masuk</a>
                @endif

                <div class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-xl opacity-0 group-hover:opacity-100 transition pointer-events-none group-hover:pointer-events-auto">
                    <div class="p-4">
                        <p class="text-sm font-semibold text-gray-900">Halo, {{ Auth::user()->name }}</p>

                        <form method="POST" action="{{ route('logout') }}" class="mt-2 inline">
                            @csrf
                            <button type="submit" class="w-full text-left text-sm text-red-600 hover:text-red-800 hover:bg-red-50 px-2 py-1 rounded">
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Mobile Menu -->
    <nav 
    x-show="open" 
    x-cloak
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 -translate-y-4"
    x-transition:enter-end="opacity-100 translate-y-0"
    x-transition:leave="transition ease-in duration-200"
    x-transition:leave-start="opacity-100 translate-y-0"
    x-transition:leave-end="opacity-0 -translate-y-4"
    class="md:hidden bg-white border-t border-gray-200 shadow-lg"
>
    <div class="px-4 py-4 space-y-4">

        <a href="{{ route('user.dashboard') }}" @click="open = false" class="block {{ request()->routeIs('user.dashboard') ? 'text-blue-900 font-semibold' : '' }}">Home</a>

        <a href="{{ route('user.paket') }}" @click="open = false" class="block {{ request()->routeIs('user.paket') || request()->routeIs('user.kerjakan') ? 'text-blue-900 font-semibold' : '' }}">Paket</a>

        <a href="{{ route('user.result') }}" @click="open = false" class="block {{ request()->routeIs('user.result') ? 'text-blue-900 font-semibold' : '' }}">Result</a>

        <a href="{{ route('user.profile') }}" @click="open = false" class="block {{ request()->routeIs('user.profile') ? 'text-blue-900 font-semibold' : '' }}">Profile</a>

        <!-- Mobile Login/Avatar -->
        <div class="pt-4 border-t">
            @if(Auth::check())
                <p class="font-semibold text-gray-800 mb-2">Halo, {{ Auth::user()->name }}</p>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="text-red-600 hover:text-red-800">Logout</button>
                </form>
            @else
                <a href="{{ route('auth.login') }}" class="block bg-blue-600 text-white text-center py-2 rounded-lg">Masuk</a>
            @endif
        </div>
    </div>
</nav>

</header>
