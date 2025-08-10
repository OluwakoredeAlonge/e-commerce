<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title', 'Dashboard')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
      <script src="https://unpkg.com/heroicons@2.0.18/dist/heroicons.min.js"></script>
    <link href="https://unpkg.com/heroicons@2.0.18/dist/heroicons.css" rel="stylesheet">
     {{-- <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script> --}}
</head>
<body class="flex min-h-screen">

    {{-- Sidebar --}}
    @include('partials.sidebar')

    {{-- Main content --}}
    <div class="flex-1 p-6">
        @yield('content')
    </div>

</body>
</html>
