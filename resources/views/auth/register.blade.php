<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>RegisterPage</title>
</head>
<body>
    
    <h1 class="">Register</h1>
    @if ($errors->any())

        <ul class="">
            @foreach ($errors->all() as $error )
                <li class="">{{ $error }}</li>
            @endforeach

        </ul>
        
    @endif
    <form action="{{ route('auth.register') }}" method="POST" class="">
        @csrf
        <label for="name" class="">Username</label>
        <input type="text" class="" name="username" id="username" value="{{ old('username') }}">
        <label for="email">Email</label>
        <input type="email" class="" name="email" id="email" value="{{ old('email') }}">
        <label for="password" class="">Password</label>
        <input type="password" class="" name="password" id="password" value="{{ old('password') }}">
        <label for="password-confirmation" class="">Password Confirmation</label>
        <input type="password" class="" name="password_confirmation">
        <button type="submit">Register</button>
    </form>
</body>
</html>