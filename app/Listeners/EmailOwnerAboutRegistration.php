<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Mail;
use App\Mail\MailNotify;
use App\Events\UserRegistered;

class EmailOwnerAboutRegistration
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(UserRegistered $event)
    {
        // $basic  = new \Nexmo\Client\Credentials\Basic(getenv("NEXMO_KEY"), getenv("NEXMO_SECRET"));
        // $client = new \Nexmo\Client($basic); 

        // $receiverNumber = "+263782140816";
        // $message = "This is testing from menokws.co.zw";

        // $message = $client->message()->send([
        //     'to' => $receiverNumber,
        //     'from' => 'Vonage APIs',
        //     'text' => $message
        // ]);
        
        Mail::to($event->email)->send(new \App\Mail\RegisterMail($event));

    }
}
