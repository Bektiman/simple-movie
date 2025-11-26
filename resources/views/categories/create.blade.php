@extends('app')
@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 overflow-visible">

    <h2 class="text-2xl font-bold mb-6">
        Add Category
    </h2>

    <form action="{{ route('category.store') }}" method="POST" class="space-y-6">
        @csrf
        <div class="">
            <label for="name" class="block text-lg mb-2">Name</label>
            <input type="name" name="name" id="name" value="{{ old('name') }}"
                class="w-full p-2 bg-gray-800 border border-gray-700 rounded focus:outline-none focus:ring-2 focus:ring-blue-600">
            @error('name')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div class="">
            <button type="submit" class="bg-blue-600 px-6 py-2 rounded hover:bg-blue-500">Save</button>
        </div>

    </form>
</div>
@endsection