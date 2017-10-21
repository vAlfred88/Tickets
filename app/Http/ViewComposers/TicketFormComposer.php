<?php
/**
 * Copyright (c) 2017. Created by vAlfred88
 */

namespace App\Http\ViewComposers;

use Illuminate\View\View;

class TicketFormComposer
{
    public function compose(View $view)
    {
        return $view->with('categories', $this->categories->all());
    }
}