<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;

trait HasRole
{
    /** Assign role to user
     * @param string $role
     * @return mixed
     */
    public function assignRole($role)
    {
        return $this->roles()->save(
            Role::whereName($role)->forstOrFail()
        );
    }

    /** User has many roles
     * @return BelongsToMany
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    /** Check if user has permission
     * @param Permission $permission
     * @return boolean
     */
    public function hasPermission(Permission $permission)
    {
        return $this->hasRole($permission->roles);
    }

    /** Check if user has role
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
