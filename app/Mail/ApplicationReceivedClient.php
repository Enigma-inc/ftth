<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Application;

class ApplicationReceivedClient extends Mailable
{
    use Queueable, SerializesModels;
  public $application;
    /**
     * Create a new message instance.
     *
     * @return void
     */
  public function __construct($application)
    {
        $this->application=Application::with(['personalDetails','serviceType',
                              'bankingDetails','location'])->find($application->id);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('neo@enigma.co.ls','Econet FTTH')
                    ->subject('FTTH Application')
                    ->markdown('emails.applications.received-client');
    }
}
