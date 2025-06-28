@extends('layouts.instructeur')

@section('page_title', 'Tableau de bord Instructeur')

@section('content')
<div class="row">
  <div class="col-md-4">
    <div class="card p-3 bg-light">
      <h5><i class="fas fa-book text-primary me-2"></i> Formations</h5>
      <p>Voir et gérer vos formations.</p>
    </div>
  </div>
  <div class="col-md-4">
    <div class="card p-3 bg-light">
      <h5><i class="fas fa-layer-group text-success me-2"></i> Catégories</h5>
      <p>Organisez vos cours en catégories.</p>
    </div>
  </div>
  <div class="col-md-4">
    <div class="card p-3 bg-light">
      <h5><i class="fas fa-chalkboard-teacher text-warning me-2"></i> Leçons</h5>
      <p>Ajouter et modifier vos leçons.</p>
    </div>
  </div>
</div>
@endsection
