@extends('app')

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 overflow-visible">

        <h2 class="text-2xl font-bold mb-6">
            Add Movie
        </h2>

        <form action="{{ route('movie.store') }}" method="POST" class="space-y-6">
            @csrf
            <div class="">
                <label for="title" class="block text-lg mb-2">Title</label>
                <input type="text" name="title" id="title"
                    class="w-full p-2 bg-gray-800 border border-gray-700 rounded focus:outline-none focus:ring-2 focus:ring-blue-600">
                @error('title')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="">
                <label for="description" class="block text-lg mb-2">Description</label>
                <textarea name="description" id="description"
                    class="w-full p-2 bg-gray-800 border border-gray-700 rounded focus:outline-none focus:ring-2 focus:ring-blue-600"></textarea>
                @error('description')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="release_date" class="block mb-2">Release Date</label>
                <input type="text" id="release_date" name="release_date"
                    class="w-full p-2 bg-gray-800 border border-gray-700 rounded focus:outline-none focus:ring-2 focus:ring-blue-600">
                @error('release_datae')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror

            </div>
            <div class="">
                <label for="cast" class="block text-lg mb-2">Cast</label>
                <input type="text" name="cast" id="cast"
                    class="w-full p-2 bg-gray-800 border border-gray-700 rounded focus:outline-none focus:ring-2 focus:ring-blue-600">
                @error('cast')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="">
                <label for="genre" class="block text-lg mb-2">Genre</label>
                <input type="text" name="genre" id="genre"
                    class="w-full p-2 bg-gray-800 border border-gray-700 rounded focus:outline-none focus:ring-2 focus:ring-blue-600">
                @error('genre')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="">
                <label for="image-url" class="block text-lg mb-2">Link Image</label>
                <input type="text" name="image-url" id="image-url"
                    class="w-full p-2 bg-gray-800 border border-gray-700 rounded focus:outline-none focus:ring-2 focus:ring-blue-600">
                @error('image-url')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="">
                <button type="submit" class="bg-blue-600 px-6 py-2 rounded hover:bg-blue-500">Save</button>
            </div>

        </form>
    </div>
@endsection
@push('scripts')
    <script>
        flatpickr("#release_date", {
            dateFormat: "Y-m-d",
            appendTo: document.body
        });
    </script>
@endpush
