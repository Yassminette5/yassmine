<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Formations Disponibles</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <!-- Bootstrap & FontAwesome -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

  <style>
    body {
      background-color: #f8f9fa;
      font-family: 'Poppins', sans-serif;
    }

    .formation-card {
      transition: transform 0.2s;
    }

    .formation-card:hover {
      transform: translateY(-5px);
    }

    .card-img-top {
      height: 180px;
      object-fit: cover;
    }

    .btn-inscrire {
      background-color: #be2623;
      color: white;
    }

    .btn-inscrire:hover {
      background-color: #a3201e;
    }
  </style>
</head>
<body>

  <div class="container py-5">
    <h2 class="mb-4 text-center fw-bold">📚 Formations disponibles</h2>

    <div class="row">
      @forelse ($formations as $formation)
        <div class="col-md-6 col-lg-4 mb-4">
          <div class="card formation-card shadow-sm h-100">
            @php
              $image = $formation->image_name 
                ? asset('storage/' . $formation->image_name) 
                : asset('images/default-formation.jpg');
            @endphp

            <img src="{{ $image }}" class="card-img-top" alt="Image Formation">
            <div class="card-body d-flex flex-column">
              <h5 class="card-title text-primary">{{ $formation->titre }}</h5>
              <p class="card-text"><strong>Instructeur:</strong> {{ $formation->instructeur->nom ?? 'Non défini' }}</p>
              <p class="card-text">{{ Str::limit($formation->description, 100) }}</p>

              <form action="{{ route('formations.inscription', $formation->id) }}" method="POST" class="mt-auto">
                @csrf
                <button type="submit" class="btn btn-inscrire w-100">S'inscrire</button>
              </form>
            </div>
          </div>
        </div>
      @empty
        <div class="alert alert-info">Aucune formation disponible.</div>
      @endforelse
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
