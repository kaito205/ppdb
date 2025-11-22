<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Admin</title>
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
            margin-bottom: 40px;
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
        }

        .btn-login:hover {
            background-color: #578FCA;
        }

        .footer {
            margin-top: 15px;
            color: #888;
            text-align: center;
            font-size: 14px;
        }
    </style>
</head>

<body>

    <div class="login-container">
        <h2>Login Admin</h2>

        @if(session('error'))
            <div style="color: red; text-align:center; margin-bottom: 10px;">
                {{ session('error') }}
            </div>
        @endif

        @if(session('success'))
            <div style="color: green; text-align:center; margin-bottom: 10px;">
                {{ session('success') }}
            </div>
        @endif

        <form action="" method="POST">
            @csrf
            <div class="form-group">
                <label for="username">Username / Email</label>
                <input type="text" id="username" name="username" placeholder="Masukkan username atau email" required>
            </div>
            <div class="form-group">
                <label for="password">Kata Sandi</label>
                <input type="password" id="password" name="password" placeholder="Masukkan password" required>
            </div>
            <button type="submit" class="btn-login">Masuk</button>
        </form>

        <div class="footer">
            &copy; {{ date('Y') }} &mdash; Kaito Company
        </div>
    </div>

</body>
</html>
