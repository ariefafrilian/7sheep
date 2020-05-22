<?php

namespace App\Listeners;

use App\Events\UserRegistration;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Jobs\SendEmailAccountActivation;

class RunJobSendEmailAccountActivationNotification
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
     * @param  UserRegistration  $event
     * @return void
     */
    public function handle(UserRegistration $event)
    {
        SendEmailAccountActivation::dispatch($event->activation);
    }
}
