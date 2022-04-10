<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('user.save_signup') }}" method="POST">
        @csrf
        <label for="loginForm">Email :</label>
        <input type="email" id="emailForm" name="email">
        @error('email')
            <div class="invalid-feedback">
            {{ $message }}
            </div>
        @enderror
        <label for="namaForm">Nama Lengkap :</label>
        <input type="text" id="namaForm" name="name">
        @error('name')
            <div class="invalid-feedback">
            {{ $message }}
            </div>
        @enderror
        <label for="loginForm">Password :</label>
        <input type="password" id="passwordForm" name="password">
        @error('password')
            <div class="invalid-feedback">
            {{ $message }}
            </div>
        @enderror
        <a href="{{ route('user.login') }}">Masuk Sekarang</a>
        <button type="submit">Daftar</button>
    </form>
</body>
</html>