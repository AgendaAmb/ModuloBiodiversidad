<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class FichaTecnicaNotification extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public $id_FichaT;
    public function __construct($id)
    {
        $this->id_FichaT=$id;
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
        $verificacionUrl=route('UserFTShow',['id'=>$this->id_FichaT]);
        return (new MailMessage)
                    ->greeting('Hola!')
                    ->subject('Ficha Tecnica Nueva')
                    ->line('Se acaba de dar de alta una nueva ficha tecnica,')
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
