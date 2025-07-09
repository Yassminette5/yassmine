<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formations - Admin</title>

  <!-- Styles -->
  <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

   <!-- SIDEBAR -->
  <aside class="sidebar" id="sidebar">
  <div class="logo text-center py-3">
    <img src="{{ asset('frontoffice/images/formini.jpeg') }}" alt="Formini" style="width: 60px;">
  </div>
  <ul class="nav flex-column px-3">
    <li class="mb-3">
      <a href="{{ route('admin.dashboard') }}" class="d-flex align-items-center text-white text-decoration-none">
        <i class="fas fa-home me-2"></i><span>Dashboard</span>
      </a>
    </li>
    <li class="mb-3">
      <a href="{{ route('admin.users') }}" class="d-flex align-items-center text-white text-decoration-none">
        <i class="fas fa-users me-2"></i><span>Utilisateurs</span>
      </a>
    </li>
    <li class="mb-3">
      <a href="{{ route('admin.courses') }}" class="d-flex align-items-center text-white text-decoration-none">
        <i class="fas fa-graduation-cap me-2"></i><span>Formations</span>
      </a>
    </li>
    <li class="mb-3">
      <a href="{{ route('admin.events') }}" class="d-flex align-items-center text-white text-decoration-none">
        <i class="fas fa-calendar-alt me-2"></i><span>Événements</span>
      </a>
    </li>
    <li class="mb-3">
      <a href="{{ route('admin.feedbacks') }}" class="d-flex align-items-center text-white text-decoration-none">
        <i class="fas fa-comment me-2"></i><span>Feedback</span>
      </a>
    </li>
    <li>
      <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="btn btn-danger w-100 d-flex align-items-center justify-content-center mt-4">
          <i class="fas fa-sign-out-alt me-2"></i><span>Déconnexion</span>
        </button>
      </form>
    </li>
  </ul>
</aside>


  <!-- CONTENU PRINCIPAL -->
  <main class="main-content">
    <!-- TOPBAR -->
    <div class="topbar d-flex align-items-center justify-content-between px-3 py-2">
      <div class="d-flex align-items-center">
        <button id="menuToggle" title="Afficher/Masquer la barre latérale"><i class="fas fa-bars"></i></button>
        <input type="text" class="search ms-3" placeholder="Rechercher...">
      </div>

      <div class="d-flex align-items-center gap-3">
        

        <!-- Mode sombre -->
        <button id="darkModeToggle" title="Mode sombre"><i class="fas fa-moon"></i></button>
      </div>
    </div>
 

    <!-- CONTENU -->
    <section class="dashboard p-4">
      <h2 class="mb-4">📚 Formations proposées</h2>

      @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
      @endif

      <div class="row">
        @forelse ($formations as $formation)
          <div class="col-md-6 col-lg-4 mb-4">
            <div class="card border-0 shadow-sm h-100">
              @php
                $image = $formation->image_name ? asset('storage/' . $formation->image_name) : asset('images/default-formation.jpg');
              @endphp
              <img src="{{ $image }}" class="card-img-top" alt="Image formation" style="height: 180px; object-fit: cover;">

              <div class="card-body d-flex flex-column">
                <h5 class="card-title text-primary">{{ $formation->titre }}</h5>
                <p><strong>Instructeur :</strong> {{ $formation->instructeur->nom ?? 'N/A' }}</p>

                <p class="mb-2"><strong>Leçons :</strong></p>
                @if ($formation->lecons && $formation->lecons->count())
                  <ul class="list-unstyled ms-3">
                    @foreach ($formation->lecons as $lecon)
                      <li><i class="fas fa-play text-success me-1"></i>{{ $lecon->titre }}</li>
                    @endforeach
                  </ul>
                @else
                  <span class="text-muted">Aucune leçon ajoutée</span>
                @endif

                <div class="mt-auto d-flex gap-2">
                  <form action="{{ route('admin.formations.accept', $formation->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <button class="btn btn-success btn-sm w-100">Accepter</button>
                  </form>
                  <form action="{{ route('admin.formations.reject', $formation->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <button class="btn btn-danger btn-sm w-100">Rejeter</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        @empty
          <div class="alert alert-info">Aucune formation disponible pour validation.</div>
        @endforelse
      </div>
    </section>
  </main>

  <!-- Scripts -->
  <script src="{{ asset('js/dashboard.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
