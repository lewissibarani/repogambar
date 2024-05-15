<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ResponPengajuanGantiPJ extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($responpengajuanpergantianpj)
    {
        $this->responpengajuanpergantianpj = $responpengajuanpergantianpj;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        $pesannotifikasi="Penanggung jawab Adobe satker anda sudah diperbaharui.";
        if($this->responpengajuanpergantianpj->status=='ditolak'){
            $pesannotifikasi="Penanggung jawab Adobe satker anda tidak disetujui oleh admin"; 
        }
        
        return [
            'pesan_notifikasi' => $pesannotifikasi,  
        ];
    }
}
