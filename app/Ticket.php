<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/** Ticket model
 *
 * Class Ticket
 * @package App
 * @mixin /Eloquent
 */
class Ticket extends Model
{
    /** Fillable forms
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'body',
        'status_id',
        'image',
    ];

    /** Ticket has many categories
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    /** Ticket has one status
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    /** Ticket belongs to user
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /** Categories list for form
     *
     * @return \Illuminate\Support\Collection
     */
    public function getCategoriesListAttribute()
    {
        return $this->categories()->pluck('id');
    }
}
