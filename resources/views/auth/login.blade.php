<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LoginPage</title>
</head>
<body>
    
    <h1 class="">Login</h1>
    @if (session('success'))
    <p class="">{{ session('success') }}</p>      
    @endif
    <form action="POST" class="">
        @csrf
        <label for="email">Email</label>
        <input type="email" class="" name="email" id="email" value="{{ old('email') }}">
        <label for="password" class="">Password</label>
        <input type="password" class="" name="password" id="password" value="{{ old('password') }}">
        <button type="submit">Register</button>
    </form>
</body>
</html>