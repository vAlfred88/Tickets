<?php
/**
 * Copyright (c) 2017. Created by vAlfred88
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

/** Модель ролей
 *
 * Class Role
 * @package App
 */
class Role extends Model
{
    /** Роль может быть связана с несколькими пользователями
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
