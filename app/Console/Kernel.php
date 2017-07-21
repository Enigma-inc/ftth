<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Application;
use App\Jobs\SendApplicationEmail;
use Illuminate\Support\Facades\Mail;
use App\Mail\ApplicationReceived;
use App\Mail\ApplicationReceivedClient;


class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function(){
             $this->sendFtthApplicationsEmails();       
        })->everyMinute();
    }

    /**
     * Register the Closure based commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        require base_path('routes/console.php');
    }

    private function sendFtthApplicationsEmails(){

       $applications=Application::with(['personalDetails','serviceType',
                               'bankingDetails','location'])->where('mail_send',false)->get();
        foreach ($applications as $application) {
            try{
               Mail::to('mokoena.n.a@gmail.com')
                ->send(new ApplicationReceived($application));

                    // Send Client Confirmation
                  Mail::to($application->personalDetails->email)
                ->send(new ApplicationReceivedClient($application));

                
                 $application->mail_send=1;
                 $application->save();
            }catch(\League\Flysystem\Exception $e){

            }
        }
    
    }
}
