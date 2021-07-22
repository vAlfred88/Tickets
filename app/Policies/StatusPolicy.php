<?php
/**
 * Copyright (c) 2017. Created by vAlfred88
 */

namespace App\Policies;

use App\Status;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class StatusPolicy
{
    use HandlesAuthorization;

    public function before($user, $ability)
    {
        if ($user->isAdmin()) {
            if ($ability == 'update' || $ability == 'delete') {
                return null;
            } else {
                return true;
            }
        }

        return false;
    }

    /**
     * Determine whether the user can create categories.
     *
     * @param  \App\User $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the category.
     *
     * @param  \App\User $user
     * @param Status $status
     * @return mixed
     */
    public function update(User $user, Status $status)
    {
        if ($status->id <= 4) {
            return false;
        }
    }

    /**
     * Determine whether the user can delete the category.
     *
     * @param User|\App\User $user
     * @param Status $status
     * @return mixed
     */
    public function delete(User $user, Status $status)
    {
        if ($status->id <= 4) {
            return false;
        }
    }
}
