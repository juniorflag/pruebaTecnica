<?php

namespace App\Listeners;

use DateTime;

use Illuminate\Auth\Events\Login;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SuccessfulLogin
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
     * @param  \Illuminate\Auth\Events\Login  $event
     * @return void
     */
  public function handle(Login $event)
{
    $event->user->previous_connection= $event->user->last_login;
    $event->user->last_login = new DateTime;
    $event->user->save();
}
}
