<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>À propos | Formini</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background-color: #f9f9f9;
      margin: 0;
      padding: 0;
    }
    .navbar {
      background-color: #0e3746;
      padding: 15px;
      text-align: center;
    }
    .navbar a {
      color: white;
      margin: 0 15px;
      text-decoration: none;
    }
    .container {
      max-width: 800px;
      margin: 50px auto;
      padding: 20px;
      background: white;
      border-radius: 10px;
      box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
    }
    h1 {
      text-align: center;
      color: #0e3746;
    }
    p {
      font-size: 16px;
      line-height: 1.6;
    }
  </style>
</head>
<body>
  <div class="navbar">
    <a href="{{ route('home') }}">Accueil</a>
 
    <a href="{{ url('/register') }}">Inscription</a>
  </div>

  <div class="container">
    <h1>À propos de Formini</h1>
    <p>
      Formini est une plateforme dédiée à l'apprentissage moderne et accessible.
    </p>
    <p>
      Notre objectif est de connecter les apprenants et les instructeurs dans une communauté éducative dynamique.
    </p>
  </div>
</body>
</html>
