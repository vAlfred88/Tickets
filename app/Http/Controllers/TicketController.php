<?php
/**
 * Copyright (c) 2017. Created by vAlfred88
 */

namespace App\Http\Controllers;

use App\Http\Requests\TicketRequest;
use App\Repositories\TicketsRepository;
use App\Ticket;
use Illuminate\Http\Request;
use Storage;

/**
 * Контроллер тикетов
 *
 * Class TicketController
 * @package App\Http\Controllers
 */
class TicketController extends Controller
{
    /**
     * @var TicketsRepository
     */
    protected $tickets;

    /**
     * TicketController constructor.
     * @param TicketsRepository $ticketsRepository
     */
    public function __construct(TicketsRepository $ticketsRepository)
    {
        $this->tickets = $ticketsRepository;
    }

    /**
     * Вывести список всех тикетов
     *
     * Выводит список тикетов по 5 записей на страницу
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tickets = $this->tickets->getLatest()->paginate(5);

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
        return view('tickets.create')
            ->with(compact('categories'));
    }

    /**
     * Сохранение тикета
     *
     * Сохранить новый тикет в базу данных
     *
     * @param TicketRequest|Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(TicketRequest $request)
    {
        $ticket = new Ticket();

        $ticket->fill($request->all());

        $ticket->assignStatus('new');

        $ticket->user()->associate(auth()->user())->save();

        if ($request->has('image')) {
            $path = 'uploads/users/'.auth()->user()->id.'/'.$ticket->id;

            $ticket->fill(['image' => $request->file('image')->store($path)])->save();
        }

        if ($request->has('categories_list')) {
            $ticket->categories()->attach($request->input('categories_list'));
        }

        flash('Ticket was created')->success();

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
        $ticket = $this->tickets->getById($id);

        return view('tickets.show')
            ->with(compact('ticket'));
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
        $ticket = $this->tickets->getById($id);

        return view('tickets.edit')
            ->with(compact('ticket'));
    }

    /**
     * Обновить тикет
     *
     * Записывает новые данные тикета в базу
     *
     * @param TicketRequest|Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(TicketRequest $request, $id)
    {
        $ticket = $this->tickets->getById($id);

        $ticket->fill($request->all())->save();

        if ($request->has('categories_list')) {
            $ticket->categories()->sync($request->input('categories_list'));
        }

        if ($request->has('statuses_list')) {
            $ticket->status()->dissociate();
            $ticket->status()->associate($request->input('statuses_list'));
        }

        if ($request->has('image')) {
            $path = 'uploads/users/'.auth()->user()->id.'/'.$ticket->id;

            $ticket->fill(['image' => $request->file('image')->store($path)]);
        }

        flash('Ticket was updated')->success();

        return redirect('/');
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
        $ticket = $this->tickets->getById($id);

        $path = 'uploads/users/'.$ticket->user->id.'/'.$id.'/';

        Storage::deleteDirectory($path);

        $ticket->delete($id);

        flash('Ticket was deleted')->warning();

        return redirect('/');
    }
}
