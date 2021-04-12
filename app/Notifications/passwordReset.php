<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class passwordReset extends Notification
{
    use Queueable;

    private $token;

 
    public function __construct($token)
    {
        $this->token =$token;
    }


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
        $url = url('/password/reset/'.$this->token);
        return (new MailMessage)
                    ->subject('Pedido de redefinição de senha')
                    ->line('Voce esta recebendo este email porque solicitou a redefinição de senha da sua conta.')
                    ->action('Redefinir senha', url($url))
                    ->line('Se Voce não solicitou uma definição de senha nenhuma ação será necessaria!');
    }


    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
