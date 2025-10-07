<!DOCTYPE html>
<html>
<head>
    <title>User Dashboard</title>
</head>
<body>
    <h1>Halo, {{ Auth::user()->name }}</h1>

    <p>Selamat datang di dashboard user. Kamu bisa mulai tryout sesuai paketmu.</p>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit">Logout</button>
    </form>
</body>
</html>
