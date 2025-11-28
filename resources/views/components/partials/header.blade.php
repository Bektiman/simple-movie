<header class="flex justify-between p-5 bg-gray-800">
    <a href="{{ route('welcome') }}" class="">
        <h1 class="text-2xl font-bold">Movie App</h1>
    </a>

    <div class="flex items-center space-x-3">
        <a href="{{ route('movie.create') }}">
            <button class="bg-blue-600 px-4 py-2 rounded hover:bg-blue-500">Add</button>
        </a>

        @auth
            <form action="{{ route('auth.logout') }}" method="POST">
                @csrf
                <button type="submit" class="bg-red-600 px-4 py-2 rounded hover:bg-red-500">Logout</button>
            </form>
        @endauth
    </div>
    <div class="text-xs">
        auth(): {{ auth()->check() ? 'YES' : 'NO' }} |
        user: {{ auth()->user()?->id ?? 'null' }}
    </div>

</header>
