<?php
/**
 * Copyright (c) 2017. Created by vAlfred88
 */

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\CreateCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Ticket;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();

        return view('categories.index')
            ->with(compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateCategoryRequest|Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCategoryRequest $request)
    {
        Category::create($request->all());

        flash('Category was created')->success();

        return redirect(route('category.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $tickets = Ticket::whereHas(
            'categories',
            function ($category) use ($slug) {
                return $category->whereSlug($slug);
            }
        )->paginate(5);

        return view('tickets.index')
            ->with(compact('tickets'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);

        return view('categories.edit')
            ->with(compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateCategoryRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, $id)
    {
        $category = Category::find($id);

        $category->fill($request->all())->save();

        flash('Category was updated')->success();

        return redirect(route('category.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::destroy($id);

        return redirect()->back();
    }
}
