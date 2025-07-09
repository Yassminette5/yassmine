<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Utilisateurs - Admin</title>

  <!-- Styles -->
  <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
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


  <!-- CONTENT -->
  <section class="dashboard p-4">
    <h2 class="fw-bold mb-4">👥 Liste des utilisateurs</h2>

    @if(session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
      <div class="card-body p-4">
        <table class="table table-hover align-middle">
          <thead class="table-dark">
            <tr>
              <th>Nom</th>
              <th>Email</th>
              <th>Rôle</th>
              <th>Bloqué</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach($users as $user)
              @if($user->role !== 'admin')
              <tr>
                <td>{{ $user->nom }}</td>
                <td>{{ $user->email }}</td>
                <td><span class="badge bg-info text-dark">{{ $user->role }}</span></td>
                <td>
                  @if($user->is_blocked)
                    <span class="badge bg-danger">Oui</span>
                  @else
                    <span class="badge bg-success">Non</span>
                  @endif
                </td>
                <td>
                  <form method="POST" action="{{ route('admin.users.toggle-block', $user->id) }}" class="d-inline">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="btn btn-sm btn-warning">
                      <i class="fas fa-ban me-1"></i>{{ $user->is_blocked ? 'Débloquer' : 'Bloquer' }}
                    </button>
                  </form>
                  <form method="POST" action="{{ route('admin.users.destroy', $user->id) }}" class="d-inline ms-2">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">
                      <i class="fas fa-trash-alt me-1"></i> Supprimer
                    </button>
                  </form>
                </td>
              </tr>
              @endif
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </section>
</main>

<!-- SCRIPTS -->
<script src="{{ asset('js/dashboard.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
  document.getElementById('searchInput').addEventListener('keyup', function () {
    const term = this.value.toLowerCase();
    const rows = document.querySelectorAll('tbody tr');
    rows.forEach(row => {
      row.style.display = row.innerText.toLowerCase().includes(term) ? '' : 'none';
    });
  });
</script>
</body>
</html>
