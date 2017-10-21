<?php
/**
 * Copyright (c) 2017. Created by vAlfred88
 */

namespace App;

use App\Traits\HasRole;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/** Модель пользователей
 *
 * Class User
 * @package App
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
