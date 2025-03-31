<?php

namespace App\Listeners;

use App\Events\UserRegistered;
use App\Jobs\SendWelcomeEmailJob;

class SendWelcomeEmail
{
    public function handle(UserRegistered $event): void
    {
        dispatch(new SendWelcomeEmailJob($event->user->email, $event->user->name));
    }
}
