<?php

namespace App\Listeners;

use App\Events\UserBecamePremium;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendThankYouEmail
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
     * @param  UserBecamePremium  $event
     * @return void
     */
    public function handle(UserBecamePremium $event)
    {
        //
    }
}
