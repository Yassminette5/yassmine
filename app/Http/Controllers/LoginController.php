<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Redirection personnalisée sans middleware
            $role = Auth::user()->role;

            if ($role === 'admin') {
                return redirect('/dashboard/admin');
            } elseif ($role === 'instructeur') {
                return redirect('/dashboard/instructeur');
            } elseif ($role === 'apprenant') {
                return redirect('/apprenant/home');
            }

            // Si le rôle est inconnu
            Auth::logout();
            return redirect('/login')->withErrors(['role' => 'Rôle inconnu.']);
        }

        return back()->withErrors([
            'email' => 'Identifiants incorrects.',
        ]);
    }
public function logout(Request $request)
{
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/'); // Redirige vers la page d'accueil après déconnexion
}


}

