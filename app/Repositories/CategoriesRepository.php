<?php

namespace App\Repositories;

use App\Category;

class CategoriesRepository
{
    protected $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function all()
    {
        return Category::all();
    }
}