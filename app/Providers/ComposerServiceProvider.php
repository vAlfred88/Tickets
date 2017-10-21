<?php
/**
 * Copyright (c) 2017. Created by vAlfred88
 */

namespace App\Providers;

use App\Http\ViewComposers\SidebarComposer;
use App\Http\ViewComposers\TicketFormComposer;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('partials.sidebar', SidebarComposer::class);
        view()->composer('partials.forms.ticket', TicketFormComposer::class);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
