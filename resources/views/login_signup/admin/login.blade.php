<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>
    <form action="{{ route('admin.autenticate') }}" method="POST">
        @csrf
        <label for="usernameForm">Username :</label>
        <input type="text" id="usernameForm" name="username">
        <label for="passwordForm">Password :</label>
        <input type="password" id="passwordForm" name="password">
        <a href="{{ route('admin.signup') }}">Daftar Sekarang</a>
        <button type="submit">Masuk</button>
    </form>
</body>
</html>