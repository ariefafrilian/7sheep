<?php

namespace App\Listeners;

use App\Events\ForgotPassword;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Jobs\SendEmailRecoverPasswordNotification;

class RunJobSendEmailRecoverPasswordNotification
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
     * @param  ForgotPassword  $event
     * @return void
     */
    public function handle(ForgotPassword $event)
    {
        SendEmailRecoverPasswordNotification::dispatch($event->reminder);
    }
}
