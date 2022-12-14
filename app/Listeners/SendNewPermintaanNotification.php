<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\User;
use App\Transaksi;
use App\PembagianTugas;
use App\Notifications\PermintaanNotification;
use Illuminate\Support\Facades\Notification;

class SendNewPermintaanNotification
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
        
        $petugas = $event->permintaan->pembagiantugas->user;
        Notification::send($petugas, new PermintaanNotification($event));
    }
}


