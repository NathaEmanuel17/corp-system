<?php

namespace App\Services;

use App\Mail\WelcomeEmail;
use Illuminate\Support\Facades\Mail;

class EmailService
{
    public function sendWelcomeEmail( string $name, string $email, string $password )
    {
        Mail::to( env('MAIL_EMAIL_TESTE') ?? $email )->send(new WelcomeEmail([
            'fromName'  => 'IAPA',
            'fromEmail' => 'email@iapa.com',
            'subject'   => 'Bem-vindo ao Sistema do IAPA!',
            'password'  => $password,
            'userName'  => $name,
            'userEmail' => $email,
        ]));
    }
}
