<?php
/**
 * Copyright (c) 2017. Created by vAlfred88
 */

namespace App\Http\Controllers;

use App\Http\Requests\CreateStatusRequest;
use App\Http\Requests\UpdateStatusRequest;
use App\Status;
use App\Ticket;

class StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $statuses = Status::all();

        return view('statuses.index')
            ->with(compact('statuses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('statuses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateStatusRequest|\Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateStatusRequest $request)
    {
        Status::create($request->all());

        flash('Status was created')->success();

        return redirect(route('status.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tickets = Ticket::whereHas(
            'status',
            function ($status) use ($id) {
                return $status->whereId($id);
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
        $status = Status::find($id);

        return view('statuses.edit')
            ->with(compact('status'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateStatusRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStatusRequest $request, $id)
    {
        $status = Status::find($id);

        $status->fill($request->all())->save();

        flash('Status was updated')->success();

        return redirect(route('status.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Status::destroy($id);

        return redirect()->back();
    }
}
