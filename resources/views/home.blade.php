{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Homepage</title>
</head>

<body>
    <ul class="">
        @foreach ($menu as $key => $value)
        <li class="">
            <a href="{{ $value }}" class="">
                {{ $key }}
            </a>
        </li>
        @endforeach
    </ul>

    <h1>
        Tampilan Homepage
    </h1>
    @foreach ($config as $c)
        <ul>
            <li class="">{{ $c }}</li>
        </ul>
    @endforeach

    <br>
    <h3 class="">
        Profile
    </h3>
    <ul>
        @foreach ($user as $key => $value)
            <li>
                {{ $key }}: {{ $value }}
            </li>
        @endforeach
    </ul>
    <ul>
        @if ($user['role'] == 'admin')
            <li>
                Role : Administrator
            </li>
        @elseif ($user['role'] == 'user')
            <li class="">
                Role : User
            </li>
        @else
            <li class="">
                Role : Guest
            </li>
        @endif

    </ul>
    <ul class="">
        @switch($movieCategory)
            @case('Action')
                <li>Movie Category : Action</li>
            @break

            @case('Horror')
                <li>Movie Category : Horror</li>
            @break

            @default
        @endswitch
    </ul>

    <li class="">{{ $user['role'] == 'admin' ? 'Administrator' : ($user['role'] == 'user' ? 'User' : 'Guest') }}</li>


</body>

</html> --}}
@extends('app')

@section('content')
    <div class="border-t border-b border-gray-200 text-white">
        <div class="max-w-7xl mx-auto py-16 px-4 sm:py-24 sm:px-6 lg:px-8">
            <h1 class="text-4xl font-blod text-center">
                Welcome to Movie App
            </h1>
            <p class="text-xl text-center mt-6">
                Sample Movie App by Laravel
            </p>

        </div>

    </div>
@endsection
