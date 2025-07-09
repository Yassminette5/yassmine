<?php

namespace App\Http\Controllers;

use App\Models\Formation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\DatabaseNotification;

class AdminController extends Controller
{
    // ✅ Tableau de bord avec dernières notifications
    public function dashboard()
    {
        $admin = Auth::user();

        $notifications = DatabaseNotification::where('notifiable_id', $admin->id)
            ->where('notifiable_type', 'App\Models\User')
            ->latest()
            ->take(5)
            ->get();

        return view('admin.dashboard', compact('notifications'));
    }

    // ✅ Liste des utilisateurs
    public function users()
    {
        return view('admin.users');
    }

    // ✅ Liste des formations proposées
    public function courses()
    {
        $formations = Formation::with(['instructeur', 'lecons'])->get();
        return view('admin.courses', compact('formations'));
    }

    // ✅ Acceptation d'une formation
    public function accepterFormation(Formation $formation)
    {
        $formation->update(['statut' => 'acceptee']);
        return back()->with('success', 'Formation acceptée.');
    }

    // ✅ Rejet d'une formation
    public function rejeterFormation(Formation $formation)
    {
        $formation->update(['statut' => 'rejetee']);
        return back()->with('danger', 'Formation rejetée.');
    }

    // ✅ Autres vues de gestion
    public function payments()
    {
        return view('admin.payments');
    }

    public function feedbacks()
    {
        return view('admin.feedbacks');
    }

    public function events()
    {
        return view('admin.events');
    }
}
