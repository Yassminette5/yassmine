<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
// Accueil général
Route::get('/', function () {
    return view('home');
});

// Inscription
Route::get('/register', [RegisterController::class, 'showForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.submit');

// Connexion
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


// Pages selon rôle
Route::get('/dashboard/admin', function () {
    return view('dashboard.admin');
});

Route::get('/dashboard/instructeur', function () {
    return view('dashboard.instructeur');
});

Route::get('/apprenant/home', function () {
    return view('apprenant.home'); // Crée ce fichier
});


Route::get('/home', function () {
    return view('home');
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

