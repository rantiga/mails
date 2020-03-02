<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class EmailForGroupC extends Mailable
{
    use Queueable, SerializesModels;

    protected $messageParameters;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($messageParameters)
    {
        $this->messageParameters = $messageParameters;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('user@example.com', 'Mailtrap')
            ->subject('New action')
            ->view('mails.mailC', $this->messageParameters);
    }
}
