<?php

namespace App\Repositories;

use App\Category;

class CategoriesRepository
{
    /** Return all rows
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public static function all()
    {
        return Category::all();
    }

    /** Return random category id
     * @return mixed
     */
    public static function getRandomId()
    {
        return Category::inRandomOrder()->first()->id;
    }

    public static function getCategoryBySlug($slug)
    {
        return Category::whereSlug($slug);
    }
}