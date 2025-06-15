<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Accueil Apprenant - Formini</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Bootstrap et FontAwesome -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <!-- Styles personnalisés -->
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
        }

        .hero {
            background: url("{{ asset('frontOffice/images/slider-bg.jpg') }}")center/cover no-repeat;
            height: 90vh;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-align: center;
        }

        .hero::before {
            content: "";
            position: absolute;
            top: 0; left: 0; width: 100%; height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .hero-content {
            position: relative;
            z-index: 2;
        }

        .hero-content h1 {
            font-size: 3.5rem;
            font-weight: bold;
        }

        .hero-content p {
            font-size: 1.2rem;
        }

        .btn-red {
            background-color: #be2623;
            color: white;
            border: none;
        }

        .btn-red:hover {
            background-color: #a3201e;
        }

        .nav-link {
            font-weight: 500;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light shadow-sm py-3">
        <div class="container">
            <a class="navbar-brand fw-bold text-dark" href="#">
                <img src="{{ asset('frontOffice/images/formini.jpeg') }}" alt="Logo" width="40"> FORMINI
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto gap-4">
                    <li class="nav-item"><a class="nav-link" href="#">HOME</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">ABOUT</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">FORMATION</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">INSTRUCTEURS</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">MESSAGE</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">EVENEMENTS</a></li>
                    
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                            <i class="fa fa-bell"></i> NOTIFICATIONS
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Aucune notification</a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
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

    <!-- Section HERO -->
    <section class="hero">
        <div class="hero-content">
            <h1>BIENVENU À <br> FORMINI</h1>
            <p>Formini offre un espace dédié à la création et au partage de formations pour tous.</p>
        </div>
    </section>

    <!-- JS Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
