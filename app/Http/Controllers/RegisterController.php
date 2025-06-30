<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Notification;
use App\Notifications\InstructeurInscriptionNotification;

class RegisterController extends Controller
{
    public function showForm()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
            'date_naissance' => 'required|date',
            'role' => 'required|in:apprenant,instructeur',
            'niveau_etude' => 'nullable|required_if:role,apprenant|string|max:255',
            'cv' => 'nullable|required_if:role,instructeur|file|mimes:pdf',
            'image' => 'nullable|image|mimes:jpg,jpeg,png',
        ]);

        $user = new User();
        $user->nom = $request->nom;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->date_naissance = $request->date_naissance;
        $user->role = $request->role;
        $user->niveau_etude = $request->niveau_etude;

        if ($request->hasFile('cv')) {
            $user->cv = $request->file('cv')->store('cvs');
        }

        if ($request->hasFile('image')) {
            $user->image = $request->file('image')->store('images');
        }

        $user->save();

        // ✅ Envoyer une notification à l'admin si c'est un instructeur
       if ($user->role === 'instructeur') {
    $adminUser = User::where('role', 'admin')->first();
    if ($adminUser) {
        Notification::send($adminUser, new InstructeurInscriptionNotification($user));
    }
}


        return redirect()->route('login')->with('success', 'Inscription réussie ! Veuillez vous connecter.');
    }
}
