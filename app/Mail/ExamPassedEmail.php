<?php

namespace App\Mail;

use App\Application\Model\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ExamPassedEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user,$returnUrl, $course)
    {
        $this->user = $user;
        $this->returnUrl = $returnUrl;
        $this->course = $course;
    }

    /**
     * Build the message.
     *
     * @return $this
     */

    public function build()
    {
        return $this->from('webmaster@meduo.net', $this->user->email . ' has passed an exam')->view('website.ExamPassedMail')->with(
            [
            'user' => $this->user,'returnUrl' => $this->returnUrl, 'course' => $this->course
            ]
    );
    }

    
}
