<?php

namespace App\Notifications;

use App\Models\KelasUjian;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UserUjianAlertNotification extends Notification
{
    use Queueable;
    public $kelasUjian;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($kelasUjian)
    {
        $this->kelasUjian = $kelasUjian;
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

    public function toArray($notifiable)
    {
        return [
            'kelas_ujian_id' => $this->kelasUjian->id,
            'ujian_id' => $this->kelasUjian->ujian_id,
            'kelas_id' => $this->kelasUjian->kelas_id,  
        ];
    }
}
