{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Movie Show</title>
</head>
<body>

   {{ dd($movie) }}
</body>
</html> --}}

@extends('app')

@section('content')
    <div class="flex flex-col md:flex-row items-start">

        <div class="w-full md:w-1/3">
            <img src="{{ $movie->image }}" alt="{{ $movie->title }}" class="rounded-lg shadow-lg">

        </div>
        <div class="md:ml-10 mt-5 md:mt-10  w-full md:w-2/3">
            <h2 class="text-4xl font-bold mb-4">{{ $movie->title }}</h2>
            <p class="text-gray-400 text-lg mb-4">Release Date: <span class="text-white">{{ $movie->release_date }}</span></p>
            <p class="text-lg mb-4 ">{{ $movie->description }}</p>
            <h3 class="text-xl font-semibold mb-2">Cast</h3>
            <ul class="text-gray-300 mb-4 list-disc list-inside">
                @forelse ($movie->cast as $cast)
                    <li class="">{{ $cast }}</li>
                @empty
                    <li class=""> {{ 'No caster' }}</li>
                @endforelse
            </ul>
            <h3 class="text-xl font-semibold mb-2">Genre</h3>
            <p class="text-gray-300 mb-4">{{ $movie->genre }}</p>
            <div class="flex space-x-4 mt-5">
                <a href="{{ route('movie.edit',$id) }}" class="">
                    <button class="bg-green-600 p-1 rounded hover:bg-green-500">
                        ✏️
                    </button>
                </a>
                <button class ="bg-red-600 p-1 rounded hover:bg-red-500">
                    🗑️
                </button>
            </div>

        </div>
    </div>
@endsection
