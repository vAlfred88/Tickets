<?php
/**
 * Copyright (c) 2017. Created by vAlfred88
 */

namespace App\Http\ViewComposers;

use App\Repositories\CategoriesRepository;
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
     * SidebarComposer constructor.
     * @param CategoriesRepository $categories
     */
    public function __construct(CategoriesRepository $categories)
    {
        $this->categories = $categories;
    }

    /** Pass categories to view
     * @param View $view
     * @return view
     */
    public function compose(View $view)
    {
        return $view->with('categories', $this->categories->all());
    }
}