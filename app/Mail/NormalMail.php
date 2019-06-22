<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NormalMail extends Mailable
{
    use Queueable, SerializesModels;
    public $message;
    public $subject;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($message,$subject)
    {
        $this->message = $message;
        $this->subject = $subject;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mail.normal')->subject($this->subject);
    }
}
