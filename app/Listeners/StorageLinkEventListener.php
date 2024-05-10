<?php

namespace App\Listeners;

use App\Events\StorageLinkEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class StorageLinkEventListener
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
     * @param StorageLinkEvent $event
     * @return void
     */
    public function handle(StorageLinkEvent $event)
    {
        //
    }
}
