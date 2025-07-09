<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Inscription à {{ $formation->titre }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap & Fonts -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/7a6f3eaa0b.js" crossorigin="anonymous"></script>

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #f6f7fb, #e2e6ec);
            min-height: 100vh;
            padding-top: 80px;
            position: relative;
        }

        .navbar-brand {
            font-weight: bold;
            color: #be2623 !important;
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.9);
            border-radius: 20px;
            padding: 40px 30px;
            max-width: 650px;
            margin: auto;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
            backdrop-filter: blur(10px);
            animation: fadeInUp 0.8s ease;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(40px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .title {
  font-size: 2rem;
  font-weight: 700;
  text-align: center;
  margin-bottom: 30px;
  color: #2d2d2d;
  letter-spacing: 1px;
}

.title .highlight {
  color: #be2623;
  font-family: 'Poppins', sans-serif;
  text-shadow: 1px 1px 2px rgba(190, 38, 35, 0.2);
}

.title .formation-title {
  color: #1c1c1c;
  font-style: italic;
  font-weight: 600;
  
}


        .form-label {
            font-weight: 500;
            color: #333;
        }

        .form-control {
            border-radius: 10px;
        }

        .form-control:focus {
            border-color: #be2623;
            box-shadow: 0 0 0 0.15rem rgba(190, 38, 35, 0.25);
        }

        .btn-submit {
            background-color: #be2623;
            color: white;
            font-weight: 600;
            border: none;
            padding: 12px;
            border-radius: 10px;
            width: 100%;
            transition: 0.3s ease;
        }

        .btn-submit:hover {
            background-color: #9f1e1c;
        }

        /* Footer */
        footer {
            background-color: #f8f9fa;
            padding: 30px 0;
            margin-top: 60px;
            border-top: 1px solid #ddd;
        }

        footer .social-icons a {
            color: #be2623;
            margin: 0 10px;
            font-size: 20px;
            transition: 0.3s ease;
        }

        footer .social-icons a:hover {
            color: #a3201e;
        }

        footer p {
            margin: 0;
            font-size: 14px;
            color: #555;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top shadow-sm py-3">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">
            <img src="{{ asset('frontOffice/images/formini.jpeg') }}" width="40" alt="Logo" class="me-2">
            FORMINI
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto gap-3">
                <li class="nav-item"><a class="nav-link fw-semibold" href="{{ route('apprenant.index') }}">Formations</a></li>
                <li class="nav-item"><a class="nav-link fw-semibold" href="#">Instructeurs</a></li>
                <li class="nav-item"><a class="nav-link fw-semibold" href="#">Messages</a></li>
                <li class="nav-item"><a class="nav-link fw-semibold" href="#">Évènements</a></li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle fw-semibold" href="#" data-bs-toggle="dropdown">
                        <i class="fa fa-user-circle"></i> {{ Auth::user()->nom }}
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-item">Se déconnecter</button>
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Formulaire -->
<div class="container">
    <div class="glass-card mt-5">
        <h2 class="title">
  <i class="fas fa-pen-nib me-2 text-danger"></i> 
  <span class="highlight">Inscription</span> 
</h2>


        <form method="POST" action="{{ route('formation.payer', $formation->id) }}">
            @csrf

            <div class="mb-3">
                <label class="form-label">Nom complet</label>
                <input type="text" name="nom" class="form-control" placeholder="Ex: Yassmine H." required>
            </div>

            <div class="mb-3">
                <label class="form-label">Adresse Email</label>
                <input type="email" name="email" class="form-control" placeholder="exemple@mail.com" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Numéro CIN</label>
                <input type="text" name="cin" class="form-control" placeholder="12345678" required>
            </div>

            <div class="mb-4">
                <label class="form-label">Mode de paiement</label>
                <select name="type_paiement" class="form-select" required>
                    <option value="">-- Choisissez un mode --</option>
                    <option value="Carte bancaire">Carte bancaire</option>
                    <option value="PayPal">PayPal</option>
                    <option value="Virement">Virement</option>
                </select>
            </div>

            <button type="submit" class="btn btn-submit">Payer {{ $formation->prix }} TND</button>
        </form>
    </div>
</div>

<!-- Footer -->
<footer class="mt-5">
    <div class="container text-center">
        <div class="social-icons mb-3">
            <a href="#"><i class="fab fa-facebook-f"></i></a>
            <a href="#"><i class="fab fa-linkedin-in"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
        </div>
        <p>&copy; {{ date('Y') }} FORMINI. Tous droits réservés.</p>
    </div>
</footer>

<!-- JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
