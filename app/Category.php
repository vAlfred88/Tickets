<?php
/**
 * Copyright (c) 2017. Created by vAlfred88
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Модель категорий
 *
 * @package App
 * @mixin /Eloquent
 * @method pluck
 */
class Category extends Model
{
    /** Атрибуты для массового заполнения
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'slug',
    ];

    /** У категории может быть много тикетов
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tickets()
    {
        return $this->belongsToMany(Ticket::class);
    }
}
