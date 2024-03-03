<?php

namespace App\Listeners;

use App\Mail\welcomeEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;


class sendWelcomeEmail
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * this handler sends a welcome email when the post is created.
     */
    public function handle(object $event): void
    {
        $email =new welcomeEmail();
        $email->content();
    }
}
