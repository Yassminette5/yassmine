@extends('layouts.instructeur')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Ajouter une nouvelle leçon</h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Erreurs :</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('instructeur.lecons.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="titre" class="form-label">Titre de la leçon</label>
            <input type="text" class="form-control" name="titre" value="{{ old('titre') }}" required>
        </div>

        <div class="mb-3">
            <label for="contenu" class="form-label">Contenu</label>
            <textarea class="form-control" name="contenu" rows="5">{{ old('contenu') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="date_creation" class="form-label">Date de création</label>
            <input type="date" class="form-control" name="date_creation" value="{{ old('date_creation') }}">
        </div>

        <div class="mb-3">
            <label for="formation_id" class="form-label">Formation associée</label>
            <select class="form-select" name="formation_id" required>
                <option value="">-- Sélectionner une formation --</option>
                @foreach ($formations as $formation)
                    <option value="{{ $formation->id }}">{{ $formation->titre }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="pdf_file_name" class="form-label">Fichier PDF (optionnel)</label>
            <input type="file" class="form-control" name="pdf_file_name" accept=".pdf">
        </div>

        <button type="submit" class="btn btn-primary">Ajouter la leçon</button>
    </form>
</div>
@endsection
