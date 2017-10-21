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
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Ticket[] $tickets
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Category whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Category whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Category whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Category whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Category whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Category inRandomOrder()
 * @method static array|\App\Category pluck($value, $value)
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
