<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InviteAttendantMail extends Mailable
{
    use Queueable, SerializesModels;

    public $token;
    public $email;

    /**
     * Create a new message instance.
     */
    public function __construct($token, $email)
    {
        $this->token = $token;
        $this->email = $email;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        $url = url('/set-password?token=' . $this->token . '&email=' . urlencode($this->email));

        return $this->subject('Complete your registration')
                    ->view('emails.invite-attendant')
                    ->with(['url' => $url]);
    }
}
