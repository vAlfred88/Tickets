<?php

namespace App\Http\Controllers;

use App\Category;
use App\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tickets = Ticket::paginate(5);

        return view('tickets.index')
            ->with(compact('tickets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('name', 'id');

        return view('tickets.create')
            ->with(compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->request->add(['status_id' => 1]);

        $ticket = auth()->user()->tickets()->create($request->all());

        if ($request->has('image')) {
            $path = 'uploads/users/'.auth()->user()->id.'/'.$ticket->id;

            $imagePath = $request->image->store($path);

            $ticket->fill(['image' => $imagePath])->save();
        }

        $ticket->categories()->attach($request->input('categories'));

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ticket = Ticket::find($id);

        return view('tickets.show')
            ->with(compact('ticket'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ticket = Ticket::find($id);

        $categories = Category::pluck('name', 'id');

        return view('tickets.edit')
            ->with(compact('ticket', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $ticket = Ticket::find($id);

        $ticket->fill($request->all())->save();
        $ticket->categories()->sync($request->input('categories_list'));

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Ticket::destroy($id);

        return redirect('/');
    }
}
