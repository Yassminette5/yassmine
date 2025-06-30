<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Notifications\DatabaseNotification;

class NotificationController extends Controller
{
    /**
     * 🔔 Afficher toutes les notifications
     */
    public function index()
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        // Utilise la méthode notifications() ajoutée par le trait Notifiable
        $notifications = $user->notifications()->latest()->paginate(10);

        return view('admin.notifications.index', compact('notifications'));
    }

    /**
     * ✅ Marquer une notification comme lue
     */
    public function markAsRead($id)
    {
        $notification = DatabaseNotification::findOrFail($id);

        // Vérifie que la notification appartient bien à l'utilisateur connecté
        if ($notification->notifiable_id === Auth::id()) {
            $notification->markAsRead();
        }

        return redirect()->route('notifications.index');
    }
}
