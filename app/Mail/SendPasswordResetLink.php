<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendPasswordResetLink extends Mailable
{
    use Queueable, SerializesModels;

    public $actionLink;
    public $email;
    public $token;

    /**
     * @param array $data expects: ['actionLink' => ..., 'email' => ..., 'token' => ...]
     */
    public function __construct(array $data)
    {
        $this->actionLink = $data['actionLink'] ?? null;
        $this->email      = $data['email'] ?? null;
        $this->token      = $data['token'] ?? null;
    }

    /**
     * Build the message (Laravel 8 style).
     */
    public function build()
    {
        return $this->subject('Send Password Reset Link')
            ->view('mail_view.password_reset_link')
            ->with([
                'actionLink' => $this->actionLink,
                'email'      => $this->email,
                'token'      => $this->token,
            ]);
    }
}
