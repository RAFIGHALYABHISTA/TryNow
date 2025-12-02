<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - TryNow</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="w-full max-w-md bg-white rounded-xl shadow-md p-8">
        <!-- Logo -->
        <div class="flex flex-col items-center mb-8">
            <img src="{{ asset('images/logo.png') }}" alt="TryNow Logo" class="w-20 mb-2">
            <h1 class="text-2xl font-bold text-blue-900">Daftar Akun</h1>
        </div>

        <!-- Form Register -->
        <form method="POST" action="{{ route('register.post') }}" class="space-y-4">
            @csrf
            <div>
                <input type="text" name="name" placeholder="Nama Lengkap"
                       class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-600 focus:outline-none" required>
            </div>
            <div>
                <input type="email" name="email" placeholder="Email"
                       class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-600 focus:outline-none" required>
            </div>
            <div>
                <input type="password" name="password" placeholder="Password"
                       class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-600 focus:outline-none" required>
            </div>
            <div>
                <input type="password" name="password_confirmation" placeholder="Konfirmasi Password"
                       class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-600 focus:outline-none" required>
            </div>

            <button type="submit" class="w-full bg-blue-900 text-white py-3 rounded-lg font-semibold hover:bg-blue-800 transition">
                Daftar
            </button>
        </form>

        <!-- Login -->
        <p class="mt-6 text-center text-sm text-gray-600">
            Sudah punya akun? 
            <a href="{{ route('auth.login') }}" class="text-blue-700 font-semibold hover:underline">Masuk</a>
        </p>
    </div>

</body>
</html>
