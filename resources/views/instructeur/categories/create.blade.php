@extends('layouts.instructeur')

@section('page_title', 'Ajouter une catégorie')

@section('content')
  @if(session('success'))
    <div class="alert alert-success">
      {{ session('success') }}
    </div>
  @endif

  <form action="{{ route('instructeur.categories.store') }}" method="POST">
    @csrf
    <div class="mb-3">
      <label for="nom" class="form-label">Nom</label>
      <input type="text" class="form-control" id="nom" name="nom" required>
    </div>
    <div class="mb-3">
      <label for="description" class="form-label">Description</label>
      <textarea class="form-control" id="description" name="description" rows="4"></textarea>
    </div>
    <button type="submit" class="btn btn-success">Ajouter</button>
  </form>
@endsection
