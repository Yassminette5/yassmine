<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard Admin</title>
  <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>

  <!-- SIDEBAR -->
  <aside class="sidebar" id="sidebar">
    <div class="logo">
      <img src="{{ asset('frontoffice\images\formini.jpeg') }}" alt="Formini">
    </div>
    <ul class="nav">
      <li data-section="utilisateurs"><i class="fas fa-users"></i><span>Utilisateurs</span></li>
      <li data-section="formations"><i class="fas fa-graduation-cap"></i><span>Formations</span></li>
      <li data-section="evenements"><i class="fas fa-calendar-alt"></i><span>Événements</span></li>
      <li data-section="feedback"><i class="fas fa-comment"></i><span>Feedback</span></li>
      <li>
  <form method="POST" action="{{ route('logout') }}" id="logout-form">
    @csrf
    <button type="submit" class="logout-button">
      <i class="fas fa-sign-out-alt"></i><span>Déconnexion</span>
    </button>
  </form>
</li>

    </ul>
  </aside>

  <!-- CONTENU PRINCIPAL -->
  <main class="main-content">
    <!-- TOPBAR -->
    <div class="topbar">
      <button id="menuToggle" title="Afficher/Masquer la barre latérale"><i class="fas fa-bars"></i></button>
      <input type="text" class="search" placeholder="Rechercher...">
      <button id="darkModeToggle" title="Mode sombre"><i class="fas fa-moon"></i></button>
    </div>

    <!-- CONTENU -->
    <section class="dashboard">
      <h2 id="admin-title" data-user='@json(auth()->user())'>Bienvenue</h2>
      <div id="utilisateurs" class="content-section active">Liste des utilisateurs</div>
      <div id="formations" class="content-section" style="display: none;">Liste des formations</div>
      <div id="evenements" class="content-section" style="display: none;">Liste des événements</div>
      <div id="feedback" class="content-section" style="display: none;">Liste des feedbacks</div>
    </section>
  </main>

  <script src="{{ asset('js/dashboard.js') }}"></script>
</body>
</html>
