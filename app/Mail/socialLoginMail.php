<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class socialLoginMail extends Mailable
{
    use Queueable, SerializesModels;

   public $name,$email,$mail_password;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name,$email,$mail_password)
    {
        $this->name = $name;
        $this->email = $email;
        $this->mail_password = $mail_password;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.socialLogin.userPassword');
    }

}
