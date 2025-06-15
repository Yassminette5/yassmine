<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
   <style>
    body {
        font-family: 'Poppins', sans-serif;
        margin: 0;
        padding: 0;
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

    .form-control {
        margin-bottom: 15px;
    }

    .btn-custom {
        background-color: #0b2e34;
        color: white;
        border: none;
    }

    .btn-custom:hover {
        background-color: #09343d;
    }
</style>

</head>
<body>

    <div class="top-half"></div>

    <div class="login-section">
        <div class="login-box text-center">
            <h3 class="fw-bold">CONNEXION</h3>
            <p class="text-muted">Entrez vos identifiants pour accéder à votre compte.</p>

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login.submit') }}">
                @csrf

                <div class="mb-3 text-start">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="Votre email" required>
                    @error('email')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3 text-start">
                    <label for="password" class="form-label">Mot de passe</label>
                    <input type="password" name="password" class="form-control" placeholder="Votre mot de passe" required>
                    @error('password')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <button type="submit" class="btn btn-login w-100 mt-3">SE CONNECTER</button>
            </form>

            <p class="mt-3">Vous n'avez pas de compte ?</p>
            <a href="{{ route('register') }}" class="btn btn-sm btn-primary">S'inscrire</a>
        </div>
    </div>

</body>
</html>