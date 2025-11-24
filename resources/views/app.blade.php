<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <title>Movie App</title>
</head>

<body class="bg-gray-900 text-white">

    @include('partials._header')

    <section class="container mx-auto p-5 overflow-visible">
        @yield('content')

    </section>
    @stack('scripts')
</body>

</html>
