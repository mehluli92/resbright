<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Exception;
use Mail;
use App\Mail\MailNotify;
use App\Events\DutyPaid;

class EmailCustomerDutyPaid
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
    public function handle(DutyPaid $event)
    {
        Mail::to($event->email)->send(new \App\Mail\StatusNotifyMail($event));
    }
}
