<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Formations</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

  <style>
    body {
      background-color: #f5f6fa;
      font-family: 'Poppins', sans-serif;
    }
.btn-inscription {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border-radius: 10px;
  text-decoration: none;
  font-weight: bold;
  transition: 0.3s ease;
}
.btn-inscription:hover {
  background-color: #388e3c;
}

    .formation-card {
      transition: transform 0.2s, box-shadow 0.3s;
      cursor: pointer;
      border-radius: 12px;
      overflow: hidden;
    }

    .formation-card:hover {
      transform: scale(1.02);
      box-shadow: 0 0 15px rgba(0, 0, 0, 0.15);
    }

    .formation-card:active {
      transform: scale(0.98);
    }

    .card-img-top {
      height: 180px;
      object-fit: cover;
    }

    .btn-inscrire {
      background-color: #be2623;
      color: white;
      transition: 0.3s ease-in-out;
      font-weight: 600;
      letter-spacing: 0.5px;
    }

    .btn-inscrire:hover {
      background-color: #a3201e;
      transform: scale(1.03);
    }

    .navbar {
      background-color: #ffffff;
    }

    .navbar .nav-link {
      font-weight: 500;
      color: #333;
    }

    .navbar .nav-link:hover {
      color: #be2623;
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
        <li class="nav-item"><a class="nav-link" href="{{ route('apprenant.index') }}">FORMATION</a></li>
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

<!-- Formations -->
<div class="container py-5">
  <h2 class="mb-4 text-center fw-bold">🎓 Nos Formations</h2>

  <div class="row">
    @foreach($formations as $formation)
      <div class="col-md-6 col-lg-4 mb-4">
        <div class="card formation-card h-100">
          <img src="{{ asset('storage/' . $formation->image_name) }}" class="card-img-top" alt="Image">
          <div class="card-body d-flex flex-column">
            <h5 class="card-title text-primary">{{ $formation->titre }}</h5>
            <p class="card-text">{{ Str::limit($formation->description, 100) }}</p>
            <ul class="list-unstyled small mb-3">
              <li><strong>Durée :</strong> {{ $formation->duree }}</li>
              <li><strong>Niveau :</strong> {{ $formation->niveau }}</li>
              <li><strong>Prix :</strong> {{ $formation->prix }} TND</li>
            </ul>

           <a href="{{ route('formation.inscription', $formation->id) }}" class="btn-inscription">S’inscrire</a>







          </div>
        </div>
      </div>
    @endforeach
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
