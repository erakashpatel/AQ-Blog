<?php

namespace AQ_Blog\Events;

use AQ_Blog\Util\DataHelper;

class TrackLogout
{
    /**
     * Handle the event.
     *
     * @param Login $event
     * @return void
     */
    public function handle(Login $event): void
    {
        DataHelper::updateLastActivity($event->user);
    }
}
