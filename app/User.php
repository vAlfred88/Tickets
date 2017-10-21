<?php
/**
 * Copyright (c) 2017. Created by vAlfred88
 */

namespace App;

use App\Traits\HasRole;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * Модель пользователей
 *
 * @package App
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Role[] $roles
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Ticket[] $tickets
 * @mixin \Eloquent
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string|null $remember_token
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUpdatedAt($value)
 */
class User extends Authenticatable
{
    use Notifiable, HasRole;

    /** Атрибуты для массового заполнения
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /** Скрытые атрибуты
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /** Пользователь может иметь много тикетов
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }

    /** Проверка на роль admin
     *
     * @return bool
     */
    public function isAdmin()
    {
        return $this->hasRole('admin');
    }
}
