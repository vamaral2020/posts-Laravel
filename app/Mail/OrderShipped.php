<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\User;

class OrderShipped extends Mailable
{
    use Queueable, SerializesModels;

    private $user;

  
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->subject('Novas Noticias Estão chegando');
        $this->to($this->user->email, $this->user->name);
        return $this->markdown('mail.newOrderShipped');
    }
}

//php artisan vendor:publish --tag=laravel-mail
