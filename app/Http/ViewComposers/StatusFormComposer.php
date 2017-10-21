<?php
/**
 * Copyright (c) 2017. Created by vAlfred88
 */

namespace App\Http\ViewComposers;

use App\Repositories\StatusesRepository;
use Illuminate\View\View;

/**
 * Class CategoryFormComposer
 * @package App\Http\ViewComposers
 */
class StatusFormComposer
{
    /**
     * @var StatusesRepository
     */
    private $statuses;

    /**
     * CategoryFormComposer constructor.
     * @param StatusesRepository $statusesRepository
     */
    public function __construct(StatusesRepository $statusesRepository)
    {
        $this->statuses = $statusesRepository;
    }

    public function compose(View $view)
    {
        return $view->with('statuses', $this->statuses->getStatusesList());
    }
}