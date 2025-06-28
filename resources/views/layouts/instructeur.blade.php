<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>@yield('title', 'Dashboard Instructeur')</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <style>
    body {
      display: flex;
      min-height: 100vh;
      margin: 0;
      font-family: 'Segoe UI', sans-serif;
      background-color: #f8f9fa;
    }

    .sidebar {
      width: 250px;
      background-color: #212529;
      color: white;
      padding: 20px;
    }

    .sidebar h4 {
      text-align: center;
      margin-bottom: 30px;
    }

    .sidebar a.btn-menu {
      display: flex;
      align-items: center;
      margin-bottom: 12px;
      background-color: #212529;
      color: white;
      padding: 10px 15px;
      border-radius: 8px;
      text-decoration: none;
      transition: background 0.3s ease;
      font-weight: 500;
      border: 1px solid #343a40;
    }

    .sidebar a.btn-menu:hover {
      background-color: #343a40;
      color: white;
    }

    .sidebar a.btn-menu i {
      margin-right: 10px;
    }

    .sidebar .btn-logout {
      background-color: #dc3545;
      color: white;
      border: none;
      padding: 10px 15px;
      border-radius: 8px;
      width: 100%;
      display: block;
      text-align: center;
      margin-top: 30px;
    }

    .sidebar .btn-logout:hover {
      background-color: #bb2d3b;
    }

    .main-content {
      flex-grow: 1;
      padding: 30px;
    }

    .topbar {
      display: flex;
      align-items: center;
      justify-content: space-between;
      margin-bottom: 30px;
    }

    .topbar h2 {
      margin: 0;
    }

    .topbar .search-bar {
      flex: 0 0 300px;
    }

    .topbar .search-bar input {
      border-radius: 30px;
      padding-left: 20px;
    }
  </style>
</head>
<body>

  <!-- Sidebar -->
  <aside class="sidebar">
    <h4>Instructeur</h4>

    <a href="{{ route('instructeur.dashboard') }}" class="btn-menu">
      <i class="fas fa-tachometer-alt"></i> Dashboard
    </a>

    <a href="{{ route('instructeur.categories.create') }}" class="btn-menu">
      <i class="fas fa-folder-plus"></i> Ajouter Catégorie
    </a>

    <a href="{{ route('instructeur.formations.create') }}" class="btn-menu">
      <i class="fas fa-chalkboard-teacher"></i> Ajouter Formation
    </a>

    <a href="{{ route('instructeur.lecons.create') }}" class="btn-menu">
      <i class="fas fa-book-open"></i> Ajouter Leçon
    </a>

    <form action="{{ route('logout') }}" method="POST">
      @csrf
      <button class="btn-logout"><i class="fas fa-sign-out-alt"></i> Déconnexion</button>
    </form>
  </aside>

  <!-- Main content -->
  <main class="main-content">
    <div class="topbar">
      <h2>@yield('page_title', 'Bienvenue Instructeur')</h2>
      <div class="search-bar">
        <input type="text" class="form-control" placeholder="Rechercher...">
      </div>
    </div>

    @yield('content')
  </main>

</body>
</html>
