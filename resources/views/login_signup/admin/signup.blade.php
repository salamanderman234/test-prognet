<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('admin.save_signup') }}" method="POST">
        @csrf
        <label for="loginForm">Username :</label>
        <input type="text" id="usernameForm" name="username">
        @error('username')
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
        <label for="phoneForm">Phone :</label>
        <input type="text" id="phoneForm" name="phone">
        @error('phone')
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
        <a href="{{ route('admin.login') }}">Masuk Sekarang</a>
        <button type="submit">Daftar</button>
    </form>
</body>
</html>