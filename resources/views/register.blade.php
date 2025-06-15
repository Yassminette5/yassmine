<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inscription | Formini</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/kTcXnD+2RmNTFZzK4HVDL2KQlNnqHXB1EwDwU6N7+N6GLfQ4Ig5o5JX/9GpC2zVvXnTq7tv7yUEAg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background-color: #f7f7f7;
      margin: 0;
      padding: 0;
    }
    .container {
      max-width: 600px;
      margin: 60px auto;
      background: white;
      padding: 40px;
      border-radius: 10px;
      box-shadow: 0 0 20px rgba(0,0,0,0.1);
    }
    h2 {
      text-align: center;
      margin-bottom: 30px;
    }
    .form-group {
      margin-bottom: 20px;
    }
    label {
      display: block;
      font-weight: 600;
      margin-bottom: 5px;
    }
    input, select {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }
    .btn {
      width: 100%;
      background-color: #0e3746;
      color: white;
      padding: 12px;
      border: none;
      border-radius: 5px;
      font-weight: bold;
      cursor: pointer;
      transition: background 0.3s;
    }
    .btn:hover {
      background-color: #be2623;
    }
    .alert-success {
      background: #d4edda;
      color: #155724;
      padding: 10px;
      border-radius: 5px;
      margin-bottom: 20px;
      text-align: center;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Inscription</h2>

    @if(session('success'))
      <div class="alert-success">
        {{ session('success') }}
      </div>
    @endif

    <form method="POST" action="{{ route('register.submit') }}" enctype="multipart/form-data">
      @csrf
      <div class="form-group">
        <label>Nom</label>
        <input type="text" name="nom" required>
      </div>
      <div class="form-group">
        <label>Prénom</label>
        <input type="text" name="prenom" required>
      </div>
      <div class="form-group">
        <label>Email</label>
        <input type="email" name="email" required>
      </div>
      <div class="form-group">
        <label>Mot de passe</label>
        <input type="password" name="password" required>
      </div>
      <div class="form-group">
        <label>Date de naissance</label>
        <input type="date" name="date_naissance" required>
      </div>
      <div class="form-group">
        <label>Rôle</label>
        <select name="role" id="role" required>
          <option value="">-- Choisir --</option>
          <option value="apprenant">Apprenant</option>
          <option value="instructeur">Instructeur</option>
        </select>
      </div>
      <div id="niveauEtudeGroup" class="form-group" style="display: none;">
        <label>Niveau d'étude</label>
        <input type="text" name="niveau_etude">
      </div>
      <div id="cvGroup" class="form-group" style="display: none;">
        <label>CV (PDF)</label>
        <input type="file" name="cv" accept="application/pdf">
      </div>
      <div class="form-group">
        <label>Image de profil (JPG, PNG)</label>
        <input type="file" name="image" accept="image/png,image/jpeg">
      </div>
      <button type="submit" class="btn">S'inscrire</button>
    </form>
  </div>

  <script>
    document.getElementById('role').addEventListener('change', function () {
      const role = this.value;
      const niveauEtudeGroup = document.getElementById('niveauEtudeGroup');
      const cvGroup = document.getElementById('cvGroup');

      niveauEtudeGroup.style.display = role === 'apprenant' ? 'block' : 'none';
      cvGroup.style.display = role === 'instructeur' ? 'block' : 'none';
    });
  </script>
</body>
</html>
