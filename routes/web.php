<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController; // ✅ Ajouté
use App\Http\Controllers\Instructeur\FormationController;
use App\Http\Controllers\Instructeur\CategorieController;
use App\Http\Controllers\Instructeur\LeconController;

// ✅ Accueil public
Route::get('/home', fn() => view('home'))->name('home');

// ✅ Inscription
Route::get('/register', [RegisterController::class, 'showForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.submit');

// ✅ Connexion
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');

// ✅ Déconnexion
Route::post('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/login');
})->name('logout');

// ✅ Redirection après login
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

// ✅ Pages Admin
Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard'); // ✅ Corrigé ici
    Route::get('/users', [UserController::class, 'index'])->name('admin.users');
    Route::patch('/users/{user}/toggle-block', [UserController::class, 'toggleBlock'])->name('admin.users.toggle-block');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('admin.users.destroy');
    Route::get('/courses', fn() => view('admin.courses'))->name('admin.courses');
    Route::get('/payments', fn() => view('admin.payments'))->name('admin.payments');
    Route::get('/feedbacks', fn() => view('admin.feedbacks'))->name('admin.feedbacks');
    Route::get('/events', fn() => view('admin.events'))->name('admin.events');
    Route::get('/tables', fn() => view('admin.tables'))->name('admin.tables');
});

// ✅ Apprenant
Route::middleware(['auth'])->get('/apprenant/home', fn() => view('apprenant.home'))->name('apprenant.home');

// ✅ Pages publiques
Route::get('/about', fn() => view('about'))->name('about');

// ✅ Instructeur
Route::prefix('instructeur')->middleware(['auth'])->group(function () {
    Route::get('/dashboard', fn() => view('instructeur.dashboard'))->name('instructeur.dashboard');

    // --- Catégories ---
    Route::get('/categories/create', [CategorieController::class, 'create'])->name('instructeur.categories.create');
    Route::post('/categories', [CategorieController::class, 'store'])->name('instructeur.categories.store');

    // --- Formations ---
    Route::get('/formations/create', [FormationController::class, 'create'])->name('instructeur.formations.create');
    Route::post('/formations', [FormationController::class, 'store'])->name('instructeur.formations.store');

    // --- Leçons ---
    Route::get('/lecons/create', [LeconController::class, 'create'])->name('instructeur.lecons.create');
    Route::post('/lecons', [LeconController::class, 'store'])->name('instructeur.lecons.store');
});
