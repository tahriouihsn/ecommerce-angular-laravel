<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmailVerification extends Mailable
{
    use Queueable, SerializesModels;

    public $_token, $_name;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($token = null, $name = null)
    {
        //  
        $this->_token = $token;
        $this->_name = $name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email')
            ->with([
                "token" => $this->_token,
                "name" => $this->_name
            ]);
    }
}
