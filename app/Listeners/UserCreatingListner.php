<?php

namespace App\Listeners;

use App\Events\UserCreatingEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UserCreatingListner
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
     * @param  \App\Events\=UserCreatingEvent  $event
     * @return void
     */
    public function handle(UserCreatingEvent $event)
    {
        dd('creation en cour  du user :'.$event->user->name);
    }
}
