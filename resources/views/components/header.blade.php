<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard User - TryNow</title>
    <!-- MENGGUNAKAN SINTAKS LARAVEL/BLADE ASLI UNTUK CSS -->
    @vite('resources/css/app.css')
    <style>
        /* Menggunakan font Inter */
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap');
        body {
            font-family: 'Inter', sans-serif;
        }
        .icon-card {
            /* Menambahkan animasi hover seperti di versi sebelumnya */
            transition: transform 0.2s, box-shadow 0.2s;
        }
        .icon-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }
    </style>
</head>