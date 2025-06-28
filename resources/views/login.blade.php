<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Connexion - Formini</title>

  <!-- Font Awesome (obligatoire pour l'œil) -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f3f3f3;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .login-container {
      background: white;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
      width: 350px;
    }

    .password-field {
      position: relative;
      margin-top: 20px;
    }

    .password-field input {
      width: 100%;
      padding: 10px 40px 10px 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    .password-field i {
      position: absolute;
      top: 50%;
      right: 10px;
      transform: translateY(-50%);
      cursor: pointer;
      color: #777;
    }
  </style>
</head>
<body>

<div class="login-container">
  <h2>Connexion</h2>
  <form>
    <label>Email</label>
    <input type="email" required style="width:100%; padding:10px; margin-top:5px; margin-bottom:15px; border:1px solid #ccc; border-radius:5px;">

    <label>Mot de passe</label>
    <div class="password-field">
      <input type="password" id="password" required>
      <i class="fas fa-eye" id="togglePassword"></i>
    </div>

    <button type="submit" style="margin-top: 20px; width: 100%; padding: 10px; background: #0e3746; color: white; border: none; border-radius: 5px;">Se connecter</button>
  </form>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    const toggle = document.getElementById('togglePassword');
    const password = document.getElementById('password');

    toggle.addEventListener('click', function () {
      const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
      password.setAttribute('type', type);
      this.classList.toggle('fa-eye-slash');
    });
  });
</script>

</body>
</html>
