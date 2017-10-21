@extends('layouts.app')

@section('content')

    @can('create', \App\Ticket::class)
        <a href="{{ route('ticket.create') }}" class="btn btn-primary">Create new</a>

        <hr>
    @endcan

    @if(count($tickets))
        @foreach($tickets as $ticket)
            <div class="card mb-4">
                @isset($ticket->image)
                    <img class="card-img-top" src="{{ asset($ticket->image) }}" alt="Card image cap">
                @endisset
                <div class="card-body">
                    <h3 class="card-title">{{ $ticket->title }}</h3>

                    <div class="card-footer text-muted">
                        Создано {{ $ticket->created_at->diffForHumans() }}
                        пользователем
                        <a href="{{ route('user.show', ['id' => $ticket->user->id]) }}">
                            {{ $ticket->user->name }}
                        </a>
                    </div>

                    <hr>

                    <small class="card-text">

                        Status: <span class="label label-success">{{ $ticket->status->label }}</span>

                        <br>

                        @unless($ticket->categories->isEmpty())
                            Category:

                            @foreach($ticket->categories as $category)
                                <span class="label label-primary">{{ $category->name }}</span>
                            @endforeach

                        @endunless
                    </small>

                    <hr>

                    <p>
                        {!! $ticket->body !!}
                    </p>

                    <ul class="nav nav-pills">
                        <li role="presentation">
                            <a href="{{ route('ticket.show', [$ticket->id]) }}">
                                Подробнее →
                            </a>
                        </li>

                        @can('update', $ticket)
                            <li role="presentation">
                                <a href="{{ route('ticket.edit', ['id' => $ticket->id]) }}">
                                    Изменить <i class="fa fa-pencil"></i>
                                </a>
                            </li>
                        @endcan

                        @can('delete', $ticket)
                            <li role="presentation">
                                <a href="#"
                                   onclick="event.preventDefault();
                                                     document.getElementById('delete-form').submit();">
                                    {{--onclick="$(this).closest('form').submit()">--}}
                                    Удалить <i class="fa fa-trash"></i>
                                </a>
                                {!! Form::open(['route' => ['ticket.destroy', 'id' => $ticket->id],
                                'method' => 'delete',
                                'id' => 'delete-form']) !!}
                                {!! Form::close() !!}
                            </li>
                        @endcan
                    </ul>

                </div>
            </div>

            <hr>
        @endforeach

        {{ $tickets->links() }}

    @else
        <div class="card mb-4">
            Nothing here
        </div>
    @endif

@endsection
