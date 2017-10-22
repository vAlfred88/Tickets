<?php
/**
 * Copyright (c) 2017. Created by vAlfred88
 */

namespace App\Listeners;

use App\Mail\TicketToAdminMail;
use App\User;

class TicketMailToAdminListener
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
        $mail = new TicketToAdminMail($event->ticket);

        $admins = User::whereHas(
            'roles',
            function ($role) {
                return $role->whereName('admin');
            }
        )->pluck('email');

        \Mail::to($admins)->send($mail);
    }
}
