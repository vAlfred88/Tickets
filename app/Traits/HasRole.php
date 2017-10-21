<?php
/**
 * Copyright (c) 2017. Created by vAlfred88
 */

namespace App\Traits;

use App\Role;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/** Дополнительный трэйт ролей
 *
 * @package App\Traits
 */
trait HasRole
{
    /** Привязать роль к пользователю
     *
     * @param string $role
     * @return mixed
     */
    public function assignRole($role)
    {
        return $this->roles()->save(
            Role::whereName($role)->firstOrFail()
        );
    }

    /** Пользователь может иметь много ролей
     *
     * @return BelongsToMany
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    /** Проверка на роль у пользователя
     *
     * @param mixed $role
     * @return boolean
     */
    public function hasRole($role)
    {
        if (is_string($role)) {
            return $this->roles->contains('name', $role);
        }

        return !!$role->intersect($this->roles)->count();
    }
}
