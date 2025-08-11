<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title', 'Dashboard')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://unpkg.com/heroicons@2.0.18/dist/heroicons.min.js"></script>
    <link href="https://unpkg.com/heroicons@2.0.18/dist/heroicons.css" rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<style>
    .error-message {
        color: red;
    }
</style>
<body class="flex min-h-screen">

    {{-- Sidebar --}}
    @include('partials.sidebar')

    {{-- Main content --}}
    <div class="flex-1 p-6">
        @if (session('success'))
            <div class="bg-green-100 text-green-800 border border-green-300 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </div>

</body>

</html>
