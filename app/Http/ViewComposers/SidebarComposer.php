<?php

namespace App\Http\ViewComposers;

use App\Repositories\CategoriesRepository;
use Illuminate\View\View;

class SidebarComposer
{
    protected $categories;

    public function __construct(CategoriesRepository $categories)
    {
        $this->categories = $categories;
    }

    public function compose(View $view)
    {
        return $view->with('categories', $this->categories->all());
    }
}