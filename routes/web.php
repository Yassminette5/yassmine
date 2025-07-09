<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\InscriptionController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Instructeur\FormationController;
use App\Http\Controllers\Instructeur\CategorieController;
use App\Http\Controllers\Instructeur\LeconController;
use App\Http\Controllers\Apprenant\FormationsController; // ✅ bien importer ici

// ✅ Page d'accueil publique
Route::get('/home', fn() => view('home'))->name('home');

// ✅ À propos
Route::get('/about', fn() => view('about'))->name('about');

// ✅ Auth : Inscription
Route::get('/register', [RegisterController::class, 'showForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.submit');

// ✅ Auth : Connexion
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');

// ✅ Auth : Déconnexion
Route::post('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/login');
})->name('logout');

// ✅ Redirection dynamique après login
Route::middleware('auth')->get('/dashboard', function () {
    $user = Auth::user();
    if ($user->role === 'admin') {
        return redirect()->route('admin.dashboard');
    } elseif ($user->role === 'apprenant') {
        return redirect()->route('apprenant.home');
    } elseif ($user->role === 'instructeur') {
        return redirect()->route('instructeur.dashboard');
    } else {
        abort(403, 'Accès non autorisé');
    }
})->name('dashboard');

// ✅ Section Admin
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/users', [UserController::class, 'index'])->name('users');
    Route::patch('/users/{user}/toggle-block', [UserController::class, 'toggleBlock'])->name('users.toggle-block');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');

    // Formations à valider
    Route::get('/courses', [AdminController::class, 'courses'])->name('courses');
    Route::patch('/formations/{id}/accept', [AdminController::class, 'accepterFormation'])->name('formations.accept');
    Route::patch('/formations/{id}/reject', [AdminController::class, 'rejeterFormation'])->name('formations.reject');

    // Autres vues
    Route::get('/payments', fn() => view('admin.payments'))->name('payments');
    Route::get('/feedbacks', fn() => view('admin.feedbacks'))->name('feedbacks');
    Route::get('/events', fn() => view('admin.events'))->name('events');
    Route::get('/tables', fn() => view('admin.tables'))->name('tables');
});

// ✅ Section Apprenant
Route::middleware(['auth'])->group(function () {
    Route::get('/apprenant/home', fn() => view('apprenant.home'))->name('apprenant.home');

    // ✅ Ajout route pour voir les formations (cartes) pour l'apprenant
    Route::get('/apprenant/formations', [FormationsController::class, 'index'])->name('apprenant.index');
    Route::post('/apprenant/formations/{id}/inscription', [FormationsController::class, 'inscrire'])
    ->name('formations.inscription');

});
// Page avec formulaire d'inscription
Route::get('/formation/{id}/inscription', [InscriptionController::class, 'formulaire'])->name('formation.inscription');

// Traitement du formulaire après soumission
Route::post('/formation/{id}/payer', [InscriptionController::class, 'payer'])->name('formation.payer');


// ✅ Section Instructeur
Route::middleware(['auth'])->prefix('instructeur')->name('instructeur.')->group(function () {

    // Dashboard
    Route::get('/dashboard', fn() => view('instructeur.dashboard'))->name('dashboard');

    // Formations
    Route::get('/formations/create', [FormationController::class, 'create'])->name('formations.create');
    Route::post('/formations', [FormationController::class, 'store'])->name('formations.store');

    // Catégories
    Route::get('/categories/create', [CategorieController::class, 'create'])->name('categories.create');
    Route::post('/categories', [CategorieController::class, 'store'])->name('categories.store');

    // Leçons
    Route::get('/lecons/create', [LeconController::class, 'create'])->name('lecons.create');
    Route::post('/lecons', [LeconController::class, 'store'])->name('lecons.store');
});
Route::get('/edit-profile', function () {
    return view('partials.edit');
})->name('partials.edit');

