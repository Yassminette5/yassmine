<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>

    <!-- Bootstrap & Font -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #fff;
        }

        .top-half {
            background: url("{{ asset('frontOffice/images/slider-bg.jpg') }}") center/cover no-repeat;
            height: 50vh;
        }

        .login-section {
            margin-top: -100px;
            padding: 50px 15px;
            background-color: #fff;
            border-top-left-radius: 30px;
            border-top-right-radius: 30px;
            box-shadow: 0 -4px 10px rgba(0, 0, 0, 0.1);
        }

        .login-box {
            max-width: 500px;
            margin: auto;
            background: white;
            padding: 40px;
            border-radius: 12px;
        }

        .btn-custom {
            background-color: #0b2e34;
            color: white;
            border: none;
        }

        .btn-custom:hover {
            background-color: #09343d;
        }

        .navbar-custom {
            background-color: #0e3746;
        }

        .navbar-custom .nav-link,
        .navbar-custom .navbar-brand {
            color: white;
        }

        .navbar-custom .nav-link:hover {
            text-decoration: none;
        }
    </style>
</head>
<body>

<!-- ✅ NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-custom">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ url('/home') }}">Formini</a>
        <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="{{ url('/home') }}">Accueil</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/about') }}">À propos</a></li>
            </ul>
        </div>
    </div>
</nav>

<!-- ✅ IMAGE -->
<div class="top-half"></div>

<!-- ✅ FORMULAIRE -->
<div class="login-section">
    <div class="login-box text-center">
        <h3 class="fw-bold">CONNEXION</h3>
        <p class="text-muted">Entrez vos identifiants pour accéder à votre compte.</p>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form method="POST" action="{{ route('login.submit') }}">
            @csrf

            <div class="mb-3 text-start">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="Votre email" required>
                @error('email')<small class="text-danger">{{ $message }}</small>@enderror
            </div>

            <div class="mb-3 text-start">
                <label for="password" class="form-label">Mot de passe</label>
                <div class="input-group">
                    <input type="password" name="password" id="password" class="form-control" placeholder="Votre mot de passe" required>
                    <button class="btn btn-outline-secondary" type="button" id="togglePassword" tabindex="-1">
                        <i class="fa-solid fa-eye-slash"></i>
                    </button>
                </div>
                @error('password')<small class="text-danger">{{ $message }}</small>@enderror
            </div>

            <button type="submit" class="btn btn-custom w-100 mt-3">SE CONNECTER</button>
        </form>

        <p class="mt-3">Vous n'avez pas de compte ?</p>
        <a href="{{ route('register') }}" class="btn btn-sm btn-primary">S'inscrire</a>
    </div>
</div>

<!-- ✅ JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const toggle = document.getElementById("togglePassword");
        const password = document.getElementById("password");
        const icon = toggle.querySelector("i");

        toggle.addEventListener("click", function () {
            const isHidden = password.type === "password";
            password.type = isHidden ? "text" : "password";

            // Mettre à jour l'icône : œil ouvert = mot de passe visible
            icon.classList.toggle("fa-eye-slash", !isHidden); // barré quand caché
            icon.classList.toggle("fa-eye", isHidden);         // normal quand visible
        });
    });
</script>

</body>
</html>
