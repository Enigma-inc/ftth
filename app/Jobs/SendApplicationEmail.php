<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Mail;
use App\Mail\ApplicationReceived;
use App\Application;
use App\Mail\ApplicationReceivedClient;

class SendApplicationEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
     
     private $application;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Application $application)
    {
        $this->application=$application;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
         Mail::to('mokoena.n.a@gmail.com')
                ->send(new ApplicationReceived($this->application));

         // Send Client Confirmation
         Mail::to($this->application->personalDetails->email)
                ->send(new ApplicationReceivedClient($this->application));
    }
}
