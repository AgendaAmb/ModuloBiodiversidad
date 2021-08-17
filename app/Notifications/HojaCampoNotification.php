<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;


class HojaCampoNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public $id_HojaCampo;
    public function __construct($id)
    {
        $this->id_HojaCampo=$id;
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
        $verificacionUrl=route('UserHCEdit',['id'=>$this->id_HojaCampo]);
        return (new MailMessage)
                    ->greeting('Hola!')
                    ->subject('Hoja de campo  Nueva')
                    ->line('Se acaba de dar de alta una nueva Hoja de campo,')
                    ->line('Deseas revisarla para poder verficarla?!')
                    ->action('Ir a verificar',$verificacionUrl)
                    ->salutation('Atentamente: Equipo de Agenda Ambiental');
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
