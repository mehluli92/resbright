<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Exception;
use Mail;
use App\Mail\MailNotify;
use App\Events\RbFileCreated;

class EmailCustomerQuotation
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
    public function handle(RbFileCreated $event)
    {
        Mail::to($event->details['email'])->send(new \App\Mail\QuotationMail($event));
       
    }
}
