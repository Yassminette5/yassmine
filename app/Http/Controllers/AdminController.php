<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\DatabaseNotification; // ✅ Utilisation de la classe native Laravel

class AdminController extends Controller
{
    // ✅ Dashboard avec notifications
    public function dashboard()
    {
        /** @var \App\Models\User $admin */
        $admin = Auth::user(); // On récupère l'utilisateur connecté (admin)

        // On récupère les 5 dernières notifications depuis la table "notifications"
        $notifications = DatabaseNotification::where('notifiable_id', $admin->id)
                            ->where('notifiable_type', 'App\Models\User')
                            ->latest()
                            ->take(5)
                            ->get();

        return view('admin.dashboard', compact('notifications'));
    }

    // ✅ Autres vues de l'admin
    public function users() {
        return view('admin.users');
    }

    public function courses() {
        return view('admin.courses');
    }

    public function payments() {
        return view('admin.payments');
    }

    public function feedbacks() {
        return view('admin.feedbacks');
    }

    public function events() {
        return view('admin.events');
    }
}
