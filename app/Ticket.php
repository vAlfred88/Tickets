<?php
/**
 * Copyright (c) 2017. Created by vAlfred88
 */

namespace App;

use App\Events\CreatedTicketEvent;
use Illuminate\Database\Eloquent\Model;

/**
 * Модель тикетов
 *
 * @package App
 * @mixin /Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Category[] $categories
 * @property-read \Illuminate\Support\Collection $categories_list
 * @property-read \App\Status $status
 * @property-read \App\User $user
 * @property int $id
 * @property string $title
 * @property string $body
 * @property string|null $image
 * @property int $user_id
 * @property int $status_id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Ticket whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Ticket whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Ticket whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Ticket whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Ticket whereStatusId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Ticket whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Ticket whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Ticket whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Ticket latest()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Ticket paginate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Ticket find($value)
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

    /**
     * @var array
     */
    protected $dispatchesEvents = [
        'saved' => CreatedTicketEvent::class,
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

    /**
     * @param $status
     * @return Model
     */
    public function assignStatus($status)
    {
        return $this->status()->associate(
            Status::whereName($status)->firstOrFail()
        );
    }
}
