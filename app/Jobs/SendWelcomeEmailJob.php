<?php

namespace App\Jobs;

use App\Mail\WelcomeEmail;
use App\Models\User;
use http\QueryString;
use Illuminate\Support\Facades\Mail;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendWelcomeEmailJob implements ShouldQueue
{
    use Queueable;


    private string $email;
    private string $name;

    public function __construct($email, $name)
    {
        $this->email = $email;
        $this->name = $name;
    }

    public function handle(): void
    {
        Mail::to($this->email)->send(new WelcomeEmail($this->email, $this->name));
    }
}
