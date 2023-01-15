<?php

namespace App\Providers;

use App\Providers\RbFileCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

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
     * @param  RbFileCreated  $event
     * @return void
     */
    public function handle(RbFileCreated $event)
    {
        //
    }
}
