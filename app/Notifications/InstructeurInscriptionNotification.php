<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\DatabaseMessage;

class InstructeurInscriptionNotification extends Notification
{
    use Queueable;

    protected $instructeur;

    public function __construct($instructeur)
    {
        $this->instructeur = $instructeur;
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toDatabase($notifiable)
    {
        return new DatabaseMessage([
            'message' => "Nouvel instructeur inscrit : " . $this->instructeur->nom,
            'instructeur_id' => $this->instructeur->id,
        ]);
    }
}
