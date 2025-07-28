<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIPMAS - Sistem Pengaduan Masyarakat</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gradient-to-b from-green-100 to-green-300 min-h-screen flex flex-col items-center justify-center">

    <!-- logo -->
    <img src="{{ asset('images/sipmas2.png') }}" alt="Logo SIPMAS" class="w-28 mb-6">

    <!-- card -->
    <div class="max-w-2xl text-center p-10 bg-white shadow-xl rounded-xl">
        <h1 class="text-4xl font-bold text-green-800 mb-4">Sistem Pengaduan Masyarakat</h1>
        <p class="text-lg text-gray-700 mb-6">Laporkan permasalahan di sekitarmu dengan mudah dan cepat!</p>
        
        <div class="flex justify-center space-x-4">
            <a href="{{ route('login') }}" class="px-6 py-2 bg-green-600 text-white font-semibold rounded-full hover:bg-green-700 transition">
                Login
            </a>
            <a href="{{ route('register') }}" class="px-6 py-2 bg-white border border-green-500 text-green-700 font-semibold rounded-full hover:bg-green-100 transition">
                Register
            </a>
        </div>
    </div>
</body>
</html>
