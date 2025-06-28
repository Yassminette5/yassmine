<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Utilisateurs - Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <style>
    body {
      display: flex;
      min-height: 100vh;
      margin: 0;
      background-color: #f5f6fa;
    }

    .sidebar {
      width: 250px;
      background-color: #2c3e50;
      color: #fff;
      padding: 25px 15px;
      flex-shrink: 0;
    }

    .sidebar .nav li {
      margin: 20px 0;
    }

    .sidebar .nav a {
      color: #fff;
      text-decoration: none;
      font-weight: 500;
    }

    .sidebar .nav a:hover {
      color: #1abc9c;
    }

    .main-content {
      flex-grow: 1;
      padding: 30px;
    }

    .topbar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 25px;
    }

    .btn-action {
      min-width: 110px;
    }

    .table th, .table td {
      vertical-align: middle;
    }

    .card {
      border: none;
      border-radius: 12px;
      box-shadow: 0 0 10px rgba(0,0,0,0.05);
    }

    .table thead {
      border-radius: 12px;
    }
  </style>
</head>
<body>

  <!-- SIDEBAR -->
  <aside class="sidebar">
    <h4 class="text-center mb-4">Admin</h4>
    <ul class="nav flex-column">
      <li><a href="/admin/dashboard"><i class="fas fa-home me-2"></i>Dashboard</a></li>
      <li><a href="/admin/users"><i class="fas fa-users me-2"></i>Utilisateurs</a></li>
      <li><a href="/admin/courses"><i class="fas fa-book me-2"></i>Formations</a></li>
      <li><a href="/admin/events"><i class="fas fa-calendar-alt me-2"></i>Événements</a></li>
      <li><a href="/admin/feedbacks"><i class="fas fa-comment me-2"></i>Feedback</a></li>
      <li>
        <form action="{{ route('logout') }}" method="POST" class="mt-3">
          @csrf
          <button class="btn btn-danger w-100"><i class="fas fa-sign-out-alt me-1"></i> Déconnexion</button>
        </form>
      </li>
    </ul>
  </aside>

  <!-- MAIN CONTENT -->
  <main class="main-content">
    <div class="topbar">
      <h2 class="fw-bold">Liste des utilisateurs</h2>
      <input type="text" id="searchInput" class="form-control w-25" placeholder=" 🔍 Rechercher...">

    </div>

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
                    <button type="submit" class="btn btn-sm btn-warning btn-action">
                      <i class="fas fa-ban me-1"></i>{{ $user->is_blocked ? 'Débloquer' : 'Bloquer' }}
                    </button>
                  </form>
                  <form method="POST" action="{{ route('admin.users.destroy', $user->id) }}" class="d-inline ms-2">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger btn-action">
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
  </main>
<script>
  document.getElementById('searchInput').addEventListener('keyup', function () {
    const searchTerm = this.value.toLowerCase();
    const rows = document.querySelectorAll('tbody tr');

    rows.forEach(row => {
      const rowText = row.innerText.toLowerCase();
      row.style.display = rowText.includes(searchTerm) ? '' : 'none';
    });
  });
</script>

</body>
</html>
