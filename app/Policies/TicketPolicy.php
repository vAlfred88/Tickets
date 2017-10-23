<?php
/**
 * Copyright (c) 2017. Created by vAlfred88
 */

namespace App\Policies;

use App\Ticket;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TicketPolicy
{
    use HandlesAuthorization;

    public function before($user, $ability)
    {
        if ($user->isAdmin()) {
            if ($ability != 'create') {
                return true;
            } else {
                return false;
            }
        }

        return null;
    }

    /**
     * Determine whether the user can view the ticket.
     *
     * @param  \App\User $user
     * @param  \App\Ticket $ticket
     * @return mixed
     */
    public function view(User $user, Ticket $ticket)
    {
        return true;
    }

    /**
     * Determine whether the user can create tickets.
     *
     * @param  \App\User $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the ticket.
     *
     * @param  \App\User $user
     * @param  \App\Ticket $ticket
     * @return mixed
     */
    public function update(User $user, Ticket $ticket)
    {
        return $user->id === $ticket->user_id;
    }

    /**
     * Determine whether the user can delete the ticket.
     *
     * @param  \App\User $user
     * @param  \App\Ticket $ticket
     * @return mixed
     */
    public function delete(User $user, Ticket $ticket)
    {
        return false;
    }
}
