<?php
/**
 * Copyright (c) 2017. Created by vAlfred88
 */

namespace App\Http\ViewComposers;

use App\Repositories\CategoriesRepository;
use Illuminate\View\View;

/**
 * Class TicketFormComposer
 * @package App\Http\ViewComposers
 */
class TicketFormComposer
{
    /**
     * @var CategoriesRepository
     */
    protected $categories;

    /**
     * TicketFormComposer constructor.
     * @param CategoriesRepository $categoriesRepository
     */
    public function __construct(CategoriesRepository $categoriesRepository)
    {
        $this->categories = $categoriesRepository;
    }

    /**
     * @param View $view
     * @return View
     */
    public function compose(View $view)
    {
        return $view->with('categories', $this->categories->getCategoriesList());
    }
}