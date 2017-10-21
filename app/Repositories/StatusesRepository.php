<?php
/**
 * Copyright (c) 2017. Created by vAlfred88
 */

namespace App\Repositories;

use App\Status;

class StatusesRepository
{
    /**
     * @var Status
     */
    protected $status;

    /**
     * StatusesRepository constructor.
     * @param Status $status
     */
    public function __construct(Status $status)
    {
        $this->status = $status;
    }

    /** Return random category id
     * @return \Illuminate\Support\Collection
     */
    public function getStatusesList()
    {
        return $this->status->pluck('label', 'id');
    }

    public function all()
    {
        return $this->status->all();
    }
}