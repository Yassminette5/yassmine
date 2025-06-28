@extends('layouts.instructeur')

@section('content')
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="container mt-4">
    <h2>Ajouter une Formation</h2>
    <form action="{{ route('instructeur.formations.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label>Titre</label>
            <input type="text" name="titre" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control"></textarea>
        </div>
        <div class="mb-3">
            <label>Catégorie</label>
            <select name="categorie_id" class="form-select">
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}">{{ $cat->nom }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3"><label>Durée</label><input type="text" name="duree" class="form-control"></div>
        <div class="mb-3"><label>Niveau</label><input type="text" name="niveau" class="form-control"></div>
        <div class="mb-3"><label>Prix</label><input type="number" name="prix" class="form-control"></div>
        <div class="mb-3"><label>Image</label><input type="file" name="image" class="form-control"></div>
        <button class="btn btn-primary">Ajouter</button>
    </form>
</div>
@endsection
