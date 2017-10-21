<?php
/**
 * Copyright (c) 2017. Created by vAlfred88
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

/** Модель тикетов
 *
 * Class Ticket
 * @package App
 * @mixin /Eloquent
 */
class Ticket extends Model
{
    /** Атрибуты для массового заполнения
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'body',
        'status_id',
        'image',
    ];

    /** Тикет может иметь несколько категорий
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    /** Тикет может иметь один статус
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    /** Тикет может быть связан с одним пользователем
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /** Возвращает атрибут categories_list
     *
     * @return \Illuminate\Support\Collection
     */
    public function getCategoriesListAttribute()
    {
        return $this->categories()->pluck('id');
    }
}
