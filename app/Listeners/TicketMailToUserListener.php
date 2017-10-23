<?php
/**
 * Copyright (c) 2017. Created by vAlfred88
 */

namespace App\Listeners;

use App\Mail\TicketToUserMail;

class TicketMailToUserListener
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
     * @param  object $event
     * @return void
     */
    public function handle($event)
    {
        $mail = new TicketToUserMail($event->ticket);

        \Mail::to($event->ticket->user->email)->send($mail);
    }
}
