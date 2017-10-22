<?php
/**
 * Copyright (c) 2017. Created by vAlfred88
 */

namespace App\Events;

use App\Ticket;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class CreatedTicketEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    /**
     * @var Ticket
     */
    public $ticket;

    /**
     * Create a new event instance.
     *
     * @param Ticket $ticket
     */
    public function __construct(Ticket $ticket)
    {
        $this->ticket = $ticket;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
