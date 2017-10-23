<?php
/**
 * Copyright (c) 2017. Created by vAlfred88
 */

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

class StatusPolicy
{
    use HandlesAuthorization;

    public function before($user, $ability)
    {
        if ($user->isAdmin()) {
            return true;
        }

        return false;
    }
}
