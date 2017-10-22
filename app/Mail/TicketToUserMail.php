<?php
/**
 * Copyright (c) 2017. Created by vAlfred88
 */

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TicketToUserMail extends Mailable
{
    use Queueable, SerializesModels;
    /**
     * @var
     */
    public $ticket;

    /**
     * Create a new message instance.
     *
     * @param $ticket
     */
    public function __construct($ticket)
    {
        //
        $this->ticket = $ticket;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->from('noreplay@tickets.org')
            ->markdown('mails.user')
            ->with('ticket', $this->ticket);
    }
}
