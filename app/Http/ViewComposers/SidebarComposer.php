<?php
/**
 * Copyright (c) 2017. Created by vAlfred88
 */

namespace App\Http\ViewComposers;

use App\Repositories\CategoriesRepository;
use App\Repositories\StatusesRepository;
use Illuminate\View\View;

/** Before render side bar, get all categories and pass it to view
 *
 * Class SidebarComposer
 * @package App\Http\ViewComposers
 */
class SidebarComposer
{
    /** Define repository
     * @var CategoriesRepository
     */
    protected $categories;

    /**
     * @var StatusesRepository
     */
    private $statuses;

    /**
     * SidebarComposer constructor.
     * @param CategoriesRepository $categories
     * @param StatusesRepository $statusesRepository
     */
    public function __construct(CategoriesRepository $categories, StatusesRepository $statusesRepository)
    {
        $this->categories = $categories;
        $this->statuses = $statusesRepository;
    }

    /** Pass categories to view
     * @param View $view
     * @return view
     */
    public function compose(View $view)
    {
        return $view->with(
            [
                'categories' => $this->categories->all(),
                'statuses' => $this->statuses->all(),
            ]
        );
    }
}