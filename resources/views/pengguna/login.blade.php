<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Siswa</title>
    <link rel="icon" href="{{ asset('img/favicon.png') }}" sizes="32x32" type="image/png">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .login-container {
            background: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }

        .login-container h2 {
            text-align: center;
            margin-bottom: 24px;
            color: #333;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 6px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 6px;
        }

        .btn-login {
            width: 100%;
            padding: 10px;
            background-color: #3674B5;
            border: none;
            color: white;
            border-radius: 6px;
            font-size: 16px;
            cursor: pointer;
            text-align: center;
            display: block;
            text-decoration: none;
        }

        .btn-login:hover {
            background-color: #578FCA;
        }

        .login-footer {
            margin-top: 15px;
            text-align: center;
            font-size: 14px;
        }

        .login-footer a {
            color: #007bff;
            text-decoration: none;
        }

        .login-footer a:hover {
            text-decoration: underline;
        }

        .brand img {
            width: 200px;
            height: auto;
            display: block;
            margin: 0 auto 20px;
        }

        .alert {
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-weight: bold;
            font-size: 14px;
            text-align: center;
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
    </style>
</head>

<body>

    <div class="login-container">

        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        @if($errors->any())
        <div class="alert alert-danger">
            <ul style="margin: 0; padding-left: 20px; text-align: left;">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="brand">
                <img src="{{ asset('img/logo.webp') }}" alt="logo">
            </div>
            <h2>Login</h2>
            <div class="form-group">
                <label for="email">Username / Email</label>
                <input type="text" id="email" name="email" placeholder="Masukkan email" required>
            </div>
            <div class="form-group">
                <label for="password">Kata Sandi</label>
                <input type="password" id="password" name="password" placeholder="Masukkan password" required>
            </div>

            <button type="submit" class="btn-login">Masuk</button>
        </form>
        <div class="login-footer">
            Belum punya akun? <a href="{{ route('register') }}">Daftar sekarang</a>
        </div>
    </div>

</body>

</html>
