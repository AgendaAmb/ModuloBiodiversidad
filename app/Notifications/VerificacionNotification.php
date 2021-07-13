<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Planta;
use App\FichaTecnica;

class VerificacionNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */

    public $id;
    public $TipoVerificacion;
    public $isRechazado;

    public function __construct($id, $TipoVerificacion,$isRechazado)
    {
        $this->id = $id;
        $this->TipoVerificacion = $TipoVerificacion;
        $this->isRechazado=$isRechazado;
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
        $Url;
        if ($this->TipoVerificacion == "HojaCampo") {
            $Planta = Planta::findorFail($this->id)->select('MotivoRechazo')->get();
            $Url=route('UserHCEdit',['id'=>$this->id]);
            if($this->isRechazado){
                return (new MailMessage)
                ->greeting('Hola!')
                ->subject('Hoja de Campo Rechazada')
                ->line('Tu hoja de campo fue rechazada por el siguente motivo,')
                ->line( $Planta->MotivoRechazo)
                ->action('Revisar',$Url)
                ->salutation('Atentamente: Equipo de Agenda Ambiental');
            }else{
                return (new MailMessage)
                ->greeting('Hola!')
                ->subject('Hoja de Campo Validada')
                ->line('Tu hoja de campo fue validada por un experto,')
                ->line('Muchas gracias por cooperar con esta gran comunidad, te gustaria observar tu hoja de campo?')
                ->action('Revisar',$Url)
                ->salutation('Atentamente: Equipo de Agenda Ambiental');
            }
        } 
        else {
            if ($this->TipoVerificacion == "FichaTecnica") {
                $FichaT = FichaTecnica::findorFail($this->id);
                $Url=route('UserHCEdit',['id'=>$this->id]);
                if($this->isRechazado){
                    return (new MailMessage)
                    ->greeting('Hola!')
                    ->subject('Ficha Técnica Rechazada')
                    ->line('Tu Ficha Técnica fue rechazada por el siguente motivo,')
                    ->line( $FichaT->MotivoRechazo)
                    ->action('Revisar',$Url)
                    ->salutation('Atentamente: Equipo de Agenda Ambiental');
                }else{
                    return (new MailMessage)
                    ->greeting('Hola!')
                    ->subject('Ficha Técnica Validada')
                    ->line('Tu Ficha Técnica fue validada por un experto,')
                    ->line('Muchas gracias por cooperar con esta gran comunidad, te gustaria observar tu Ficha Técnica?')
                    ->action('Revisar',$Url)
                    ->salutation('Atentamente: Equipo de Agenda Ambiental');
                }
            }
        }

      
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
