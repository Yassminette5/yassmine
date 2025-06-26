<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Log;

// ✅ Accueil public
Route::get('/', function () {
    return view('home');
})->name('home');

// ✅ Inscription
Route::get('/register', [RegisterController::class, 'showForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.submit');

// ✅ Connexion
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');

// ✅ Déconnexion (1 seule fois !)

Route::post('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/login');
})->name('logout');

// ✅ Redirection après login selon rôle
Route::middleware('auth')->get('/dashboard', function () {
    $user = Auth::user();

    if ($user->role === 'admin') {
        return redirect()->route('admin.dashboard');
    } elseif ($user->role === 'apprenant') {
        return redirect('/apprenant/home');
    } else {
        abort(403, 'Accès non autorisé');
    }
})->name('dashboard');


// ✅ Pages Admin protégées par auth
Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::get('/users', function () {
        return view('admin.users');
    })->name('admin.users');

    Route::get('/courses', function () {
        return view('admin.courses');
    })->name('admin.courses');

    Route::get('/payments', function () {
        return view('admin.payments');
    })->name('admin.payments');

    Route::get('/feedbacks', function () {
        return view('admin.feedbacks');
    })->name('admin.feedbacks');

    Route::get('/events', function () {
        return view('admin.events');
    })->name('admin.events');

    Route::get('/tables', function () {
        return view('admin.tables');
    })->name('admin.tables');
});

// ✅ Apprenant
Route::middleware(['auth'])->get('/apprenant/home', function () {
    return view('apprenant.home');
})->name('apprenant.home');

// ✅ Autres pages publiques
Route::get('/about', function () {
    return view('about');
})->name('about');
