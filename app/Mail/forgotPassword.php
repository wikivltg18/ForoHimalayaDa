<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class forgotPassword extends Mailable
{
    use Queueable, SerializesModels;


    public $emailUser, $token;

    public function __construct($emailUser,$token)
    {
        $this->emailUser = $emailUser;
        $this->token = $token;
    }


    public function build()
    {
        return $this->view('Mails.forgotPassword')
        ->subject('Recuperar contraseña')
        ->with(['emailUser' => $this->emailUser],['token' => $this->token]);

    }


}
