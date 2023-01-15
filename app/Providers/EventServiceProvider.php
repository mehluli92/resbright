<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use App\Events\UserRegistered;
use App\Listeners\EmailOwnerAboutRegistration;

//status notifications events and listeners
use App\Events\RbFileCreated;
use App\Listeners\EmailCustomerQuotation;
use App\Events\PaymentMade;
use App\Listeners\EmailCustomerPaymentMade;
use App\Events\Acquital;
use App\Listeners\EmailCustomerAcquital;
use App\Events\Closed;
use App\Listeners\EmailCustomerClosed;
use App\Events\Delivered;
use App\Listeners\EmailCustomerDelivered;
use App\Events\Dispatched;
use App\Listeners\EmailCustomerDispached;
use App\Events\DutyPaid;
use App\Listeners\EmailCustomerDutyPaid;
use App\Events\EntryDeclared;
use App\Listeners\EmailCustomerEntryDeclared;
use App\Events\PhysicalExam;
use App\Listeners\EmailCustomerPhysicalExam;


class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        UserRegistered::class => [
            EmailOwnerAboutRegistration::class,
        ],
        RbFileCreated::class => [
            EmailCustomerQuotation::class,
        ],
        PaymentMade::class => [
            EmailCustomerPaymentMade::class,
        ],
        //status updates events and handlers 
        Acquital::class => [
            EmailCustomerAcquital::class,
        ],
        Closed::class => [
            EmailCustomerClosed::class,
        ],
        Delivered::class => [
            EmailCustomerDelivered::class,
        ],
        Dispatched::class => [
            EmailCustomerDispached::class,
        ],
        DutyPaid::class => [
            EmailCustomerDutyPaid::class,
        ],
        EntryDeclared::class => [
            EmailCustomerEntryDeclared::class,
        ],
        PhysicalExam::class => [
            EmailCustomerPhysicalExam::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
