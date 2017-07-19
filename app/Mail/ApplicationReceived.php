<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Application;

class ApplicationReceived extends Mailable
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
       $fullNames=$this->application->personalDetails->name.' '.$this->application->personalDetails->surname;
        return $this->from('neo@enigma.co.lss')
                        ->subject('FTTH Application from '.$fullNames)
                    ->markdown('emails.applications.received');
    }
}


