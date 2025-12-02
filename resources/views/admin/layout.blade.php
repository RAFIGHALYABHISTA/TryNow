<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-800">
    <div class="flex-1 flex flex-col">
            {{-- Navbar --}}
            @include('admin.components.navbar')
            
    <div class="flex min-h-screen">
        {{-- Sidebar --}}
        @include('admin.components.sidebar')

            {{-- Konten --}}
            <main class="flex-1 p-6">
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>