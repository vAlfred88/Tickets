<?php
/**
 * Copyright (c) 2017. Created by vAlfred88
 */

namespace App\Repositories;

use App\Category;
use App\Ticket;

class TicketsRepository
{
    /**
     * @var Category
     */
    protected $ticket;

    /**
     * TicketsRepository constructor.
     * @param Ticket $ticket
     * @internal param Category $category
     */
    public function __construct(Ticket $ticket)
    {
        $this->ticket = $ticket;
    }

    public function getLatest()
    {
        return $this->ticket->latest();
    }
}