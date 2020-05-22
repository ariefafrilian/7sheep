<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Notifications\AccountActivation;
use App\User;

class SendEmailAccountActivation implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $activation;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($activation)
    {
        $this->activation = $activation;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $user = User::findOrFail($this->activation->user_id);
        $user->notify(new AccountActivation($user->first_name, encrypt($this->activation)));
    }
}
