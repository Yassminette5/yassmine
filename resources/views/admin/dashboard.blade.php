<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard Admin</title>
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
        <!-- Icône Notification -->
        <div class="dropdown me-3">
          <button class="btn btn-light position-relative" data-bs-toggle="dropdown">
            <i class="fas fa-bell"></i>
            @if($notifications->count() > 0)
              <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                {{ $notifications->count() }}
              </span>
            @endif
          </button>

          <ul class="dropdown-menu dropdown-menu-end mt-2 shadow" style="width: 300px;">
            <li class="dropdown-header">Notifications récentes</li>
            @forelse($notifications as $notif)
              <li>
                <a class="dropdown-item small text-wrap">
                  <i class="fas fa-envelope me-2 text-primary"></i>
                  {{ $notif->data['message'] ?? 'Nouvelle notification' }}
                </a>
              </li>
            @empty
              <li><span class="dropdown-item text-muted">Aucune notification</span></li>
            @endforelse
          </ul>
        </div>

        <!-- Mode sombre -->
        <button id="darkModeToggle" title="Mode sombre"><i class="fas fa-moon"></i></button>
      </div>
    </div>

    <!-- CONTENU -->
    <section class="dashboard p-4">
      <h2 id="admin-title" data-user='@json(auth()->user())'>👋 Bienvenue, {{ auth()->user()->nom }}</h2>
    </section>
  </main>

  <!-- JS -->
  <script src="{{ asset('js/dashboard.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>