<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'SIPMAS')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    @include('partials.navbar')

    <main class="py-4">
        @yield('content')
    </main>
</body>
</html>
