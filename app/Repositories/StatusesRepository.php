<?php

namespace App\Repositories;

use App\Status;

class StatusesRepository
{
    /** Return random category id
     * @return mixed
     */
    public static function getRandomId()
    {
        return Status::inRandomOrder()->first()->id;
    }
}