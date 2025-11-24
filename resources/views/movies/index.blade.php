{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Movie Index</title>
</head>

<body>

    <ul class="">
        @foreach ($menu as $key => $value)
        <li class="">
            <a href="{{  }}" class="">
                {{  }}
            </a>
        </li>
        @endforeach
    </ul>

    <h1>
        {{ $titlePage }}
    </h1>

    {{-- <table border="1">
        <thead>
            <tr>
                <th>Title</th>
                <th>Year</th>
                <th>Genre</th>
            </tr>
        </thead>
        <tbody>
            {{-- @foreach ($movies as $movie)
                <tr>
                    <td>{{ $movie['title'] }}</td>
                    <td>{{ $movie['year'] }}</td>
                    <td>{{ $movie['genre'] }}</td>
                </tr>
            @endforeach --}}
{{-- @forelse ($movies as $movie)
                @if ($movie['year'] > 2019)
                    <tr>
                        @if ($loop->first)
                            <td>First:Movie {{ $movie['title'] }}</td>
                        @elseif ($loop->last)
                            <td>Lats:Movie{{ $movie['year'] }}</td>
                        @else
                            <td>{{ $movie['genre'] }}</td>
                        @endif
                    </tr>
                @endif

            @empty
                <tr>
                    <td>No Movie Found</td>
                </tr>
            @endforelse
        </tbody>
    </table> --}}

{{-- @foreach ($movies as $movie)
        {{-- <p class="{{ $loop->first ? 'font-bold' : ($loop->last ? 'italic' : '') }}">
            {{ $movie['title'] }} - {{ $movie['year'] }} - {{ $movie['genre'] }}
        </p> --}}

{{-- @include('partials._movie',['movie'=>$movie])
    @endforeach --}}

{{-- </body>

</html> --}}

@extends('app')

@section('content')
    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-5">
        @foreach ($movies as $movie)
            <div class="bg-gray-800 p-4 rounded-lg relative group">
                <a href="{{ route('movie.show', $loop->index) }}" class="">
                <img src="{{ $movie->image }}" alt="" class="w-full rounded-md">
                <h3 class="text-lg mt-2">{{ $movie->title }}</h3>
                <p class="text-sm text-gray-400">{{ $movie->release_date }}</p>
                <div class="absolute top-2 right-2 space-x-2 opacity-0 group-hover:opacity-100 transition">
                    <a href="{{ route('movie.edit', $loop->index) }}" class="bg-green-600 p-1 rounded hover:bg-green-500">
                        ✏️
                    </a>
                    <button class ="bg-red-600 p-1 rounded hover:bg-red-500">
                        🗑️
                    </button>
                </div>
                </a>
            </div>
        @endforeach
    </div>
@endsection
