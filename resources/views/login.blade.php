<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion - Formini</title>
    <link rel="stylesheet" href="{{ asset('frontOffice/css/style.css') }}">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: #f3f3f3;
        }
        .login-container {
            width: 400px;
            margin: 80px auto;
            padding: 25px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .logo {
            width: 120px;
            margin: 0 auto 20px;
            display: block;
        }
        .success-msg {
            color: green;
            text-align: center;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
<div class="login-container">
    <img src="{{ asset('frontOffice/images/formini.jpeg') }}" class="logo" alt="Logo Formini">
    
    @if(session('success'))
        <div class="success-msg">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div>
            <label>Email</label>
            <input type="email" name="email" required class="form-control">
        </div>
        <div>
            <label>Mot de passe</label>
            <input type="password" name="password" required class="form-control">
        </div>
        <div class="mt-3">
            <button type="submit" class="btn btn-danger w-100">Se connecter</button>
        </div>
    </form>
</div>
</body>
</html>
