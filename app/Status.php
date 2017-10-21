<?php
/**
 * Copyright (c) 2017. Created by vAlfred88
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

/** Модель статусов
 *
 * Class Status
 * @package App
 */
class Status extends Model
{
    /** Статус может иметь несколько тикетов
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ticket()
    {
        return $this->hasMany(Ticket::class);
    }
}
