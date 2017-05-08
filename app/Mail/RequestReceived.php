<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class RequestReceived extends Mailable
{
    use Queueable, SerializesModels;
    public $survey;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($survey)
    {
        $this->survey=$survey;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->from('test@gmail.com')
                    ->markdown('emails.request-received');
    }
}
