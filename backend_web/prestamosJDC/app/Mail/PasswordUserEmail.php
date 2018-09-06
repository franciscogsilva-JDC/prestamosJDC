<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class PasswordUserEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $generatedPassword;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, $generatedPassword)
    {
        $this->user = $user;
        $this->generatedPassword = $generatedPassword;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.passwordUserEmail')
                ->subject('Contraseña de acceso - '.env('APP_NAME'));
    }
}
