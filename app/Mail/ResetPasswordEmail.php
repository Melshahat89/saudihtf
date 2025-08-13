<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ResetPasswordEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $token)
    {
        $this->user = $user;
        $this->token = $token;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        //webmaster@meduo.net
        
        return $this->from('webmaster@meduo.net', 'Health Tourism Future Password Reset')->view('website.resetPasswordEmail')->with([
            'user' => $this->user,
            'token' => $this->token,
        ]);
    }
}
