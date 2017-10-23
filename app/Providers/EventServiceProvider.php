<?php
/**
 * Copyright (c) 2017. Created by vAlfred88
 */

namespace App\Providers;

use App\Events\CreatedTicketEvent;
use App\Listeners\TicketMailToAdminListener;
use App\Listeners\TicketMailToUserListener;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        CreatedTicketEvent::class => [
            TicketMailToAdminListener::class,
            TicketMailToUserListener::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
