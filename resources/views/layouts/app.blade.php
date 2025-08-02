<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'SIPMAS')</title>

    {{-- Gunakan hanya Tailwind CSS --}}
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- Font Awesome (jika dibutuhkan untuk ikon) --}}
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body class="bg-gray-50">

    <div class="flex h-screen">
        {{-- Sidebar kiri --}}
        @include('partials.sidebar')

        {{-- Konten kanan --}}
        <div class="flex-1 flex flex-col overflow-hidden">
            {{-- Topbar --}}
            @include('partials.topbar')

            {{-- Konten halaman --}}
            <main class="flex-1 overflow-y-auto p-6 bg-gray-100">
                @yield('content')
            </main>
        </div>
    </div>

</body>
</html>
