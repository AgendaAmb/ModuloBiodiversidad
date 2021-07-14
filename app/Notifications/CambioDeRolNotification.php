<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CambioDeRolNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
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
        $Url=route('dashbord');
        return (new MailMessage)
            ->greeting('Hola!')
            ->subject('Asiganción de Rol-Biodiversidad')
            ->line('Bienvenido a nuestro Sistema de Biodiversidad.Gracias por unirte a esta gran comunidad, deseas entrar ahora? da click en el siguiente botón:')
            ->action('Entrar',  $Url)
            ->line('Gracias por usar nuestra aplicación!')
            ->salutation('Atentamente: Equipo de Gestion Ambiental');
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
