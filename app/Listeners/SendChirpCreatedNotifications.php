<?php

namespace App\Listeners;

use App\Events\ChirpCreated;
use App\Models\User;
use App\Notifications\NewChirp;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendChirpCreatedNotifications implements ShouldQueue // dit à Laravel que le listener run dans une queue par default = async on doit run 'php artisan queue:work' !!!
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(ChirpCreated $event): void
    {
        //
        // Envoi d'une notif à tous les users de la plateforme sauf l'auteur du Chirp. un peu bête -> rajouter follow feature pour notif uniquement si follower de l'auteur. 
        foreach (User::whereNot('id', $event->chirp->user_id)->cursor() as $user) { // 'cursor()' pour eviter de charger tous les users en mémoire d'un coup
            $user->notify(new NewChirp($event->chirp));
        }
        // Important -> Donner la possibilité aux users de ne plus suivre les notifications de ce type ! 
        // SMTP server nécessaire pour mise en PROD 
    }
}
