<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
    <title>Movie App</title>
</head>

<body class="bg-gray-900 text-white h-screen overflow-hidden">

    {{-- HEADER FIXED --}}
    <x-partials.header class="z-10" />

    <div class="flex h-full pt-4"> {{-- pt sesuai tinggi header jika fixed --}}
        
        {{-- SIDEBAR --}}
        <aside class="w-48 bg-gray-800 p-6 text-white flex-shrink-0">
            {{ $sidebar }}
        </aside>

        {{-- MAIN CONTENT SCROLLABLE --}}
        <main class="flex-1 p-6 overflow-y-auto">
            {{ $main }}
        </main>

    </div>

    @stack('scripts')
</body>


</html>
