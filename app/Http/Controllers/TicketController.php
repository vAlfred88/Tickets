<?php
/**
 * Copyright (c) 2017. Created by vAlfred88
 */

namespace App\Http\Controllers;

use App\Category;
use App\Status;
use App\Ticket;
use Illuminate\Http\Request;

/**
 * Контроллер тикетов
 *
 * Class TicketController
 * @package App\Http\Controllers
 */
class TicketController extends Controller
{
    /**
     * Вывести список всех тикетов
     *
     * Выводит список тикетов по 5 записей на страницу
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
     * Вывести форму добавления
     *
     * Выводит форму для добавления нового тикета
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
     * Сохранение тикета
     *
     * Сохранить новый тикет в базу данных
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
     * Показать тикет
     *
     * Выводит тикет с определнным ид
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ticket = Ticket::find($id);

        $statuses = Status::pluck('label', 'id');

        return view('tickets.show')
            ->with(compact('ticket', 'statuses'));
    }

    /**
     * Показать форму редактирования
     *
     * Выводит форму редактирования выбранного тикета
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
     * Обновить тикет
     *
     * Записывает новые данные тикета в базу
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

        if ($request->has('statuses_list')) {
            $ticket->status()->dissociate();
            $ticket->status()->associate($request->input('statuses_list'));
        }

        return redirect()->back();
    }

    /**
     * Удалить тикет
     *
     * Удаляет выбранные тикет
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
