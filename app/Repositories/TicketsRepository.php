<?php
/**
 * Copyright (c) 2017. Created by vAlfred88
 */

namespace App\Repositories;

use App\Category;
use App\Ticket;

/**
 * Class TicketsRepository
 * @package App\Repositories
 */
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

    /**
     * @return Ticket|\Illuminate\Database\Eloquent\Builder
     */
    public function getLatest()
    {
        return $this->ticket->latest();
    }

    /**
     * @param $id
     * @return Ticket|\Illuminate\Database\Eloquent\Builder
     */
    public function getById($id)
    {
        return $this->ticket->find($id);
    }

    /**
     * @param $id
     * @return int
     */
    public function delete($id)
    {
        return $this->ticket->destroy($id);
    }
}