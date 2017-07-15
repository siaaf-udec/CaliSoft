<?php

namespace App\Container\Calisoft\Src\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\Container\Calisoft\Src\Proyecto;
use App\User;

class Invitacion extends Notification implements ShouldQueue
{
    use Queueable;

    private $proyecto;
    private $from;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(User $from, Proyecto $proyecto)
    {
        $this->from = $from;
        $this->proyecto = $proyecto;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
          ->subject('Has recibido una invitacion')
          ->markdown('mail.invitacion', [
            'user' => $notifiable,
            'proyecto' => $this->proyecto,
            'from' => $this->from
          ]);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
