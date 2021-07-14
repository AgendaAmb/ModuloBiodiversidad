<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UsuarioNuevoNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public $User;
    public function __construct($user)
    {
        $this->User=$user;
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
        $Url = route('UserAdmin');
        return (new MailMessage)
            ->greeting('Hola!')
            ->subject('Usuario Nuevo Registrado-Biodiversidad')
            ->line('Se acaba de dar de alta un nuevo usuario,')
            ->line('Deseas asignarle un rol?!')
            ->line('Datos:',$this->User->name)
            ->action('Asignar Rol', $Url)
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
