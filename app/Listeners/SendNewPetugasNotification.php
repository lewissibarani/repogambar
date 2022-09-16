<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\User;
use App\Transaksi;
use App\PembagianTugas;
use App\Notifications\PetugasNotification;
use Illuminate\Support\Facades\Notification;

class SendNewPetugasNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $peminta = $event->permintaan->permintaan->user;
        Notification::send($peminta, new PetugasNotification($event));
    }
}
