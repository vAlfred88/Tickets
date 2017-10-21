<?php
/**
 * Copyright (c) 2017. Created by vAlfred88
 */

namespace App\Repositories;

use App\Category;

/** Репозиторий категорий
 *
 * @package App\Repositories
 */
class CategoriesRepository
{
    /**
     * @var Category
     */
    protected $category;

    /** Конструктор
     *
     * @param Category $category
     */
    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    /** Возвращает все категории
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public static function all()
    {
        return Category::all();
    }

    /** Возвращает массив категорий
     *
     * @return array
     */
    public function getCategoriesList()
    {
        return $this->category->pluck('name', 'id');
    }

    /** Возвращает случайную категорию
     *
     * @return mixed
     */
    public static function getRandomId()
    {
        return Category::inRandomOrder()->first()->id;
    }

    /** Получить категорию по slug
     *
     * @param $slug
     * @return mixed
     */
    public static function getCategoryBySlug($slug)
    {
        return Category::whereSlug($slug);
    }
}