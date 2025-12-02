<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - TryNow</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="w-full max-w-md bg-white rounded-xl shadow-md p-8">
        <!-- Logo -->
        <div class="flex flex-col items-center mb-8">
            <img src="{{ asset('images/logo.png') }}" alt="TryNow Logo" class="w-20 mb-2">
            <h1 class="text-2xl font-bold text-blue-900">TryNow</h1>
        </div>

        <!-- Form Login -->
        <form method="POST" action="{{ route('login.post') }}" class="space-y-4">
            @csrf
            <div>
                <input type="email" name="email" placeholder="Email" 
                       class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-600 focus:outline-none" required>
            </div>
            <div class="relative">
                <input type="password" name="password" placeholder="Password" 
                       class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-600 focus:outline-none" required>
                <span class="absolute inset-y-0 right-3 flex items-center text-gray-400 cursor-pointer">
                    👁️
                </span>
            </div>
            
            <div class="flex justify-end">
                <a href="#" class="text-sm text-gray-500 hover:underline">Lupa Password?</a>
            </div>

            <button type="submit" class="w-full bg-blue-900 text-white py-3 rounded-lg font-semibold hover:bg-blue-800 transition">
                Masuk
            </button>
        </form>

        <!-- OR -->
        <div class="flex items-center my-6">
            <hr class="flex-1 border-gray-300">
            <span class="px-2 text-gray-500 text-sm">atau</span>
            <hr class="flex-1 border-gray-300">
        </div>

        <!-- Google & Facebook -->
        <div class="space-y-3">
            <a href="#" class="flex items-center justify-center gap-2 w-full border py-3 rounded-lg font-medium hover:bg-gray-50">
                <img src="https://www.svgrepo.com/show/475656/google-color.svg" class="w-5 h-5"> Google
            </a>
            <a href="#" class="flex items-center justify-center gap-2 w-full border py-3 rounded-lg font-medium hover:bg-gray-50">
                <img src="https://www.svgrepo.com/show/475647/facebook-color.svg" class="w-5 h-5"> Facebook
            </a>
        </div>

        <!-- Register -->
        <p class="mt-6 text-center text-sm text-gray-600">
            Belum punya akun?
            <a href="{{ route('auth.register') }}" class="text-blue-700 font-semibold hover:underline">Daftar</a>
        </p>
    </div>

</body>
</html>
