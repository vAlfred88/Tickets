@extends('layouts.app')

@section('content')

    @can('create', \App\Ticket::class)
        <a href="{{ route('ticket.create') }}" class="btn btn-primary">Create new</a>

        <hr>
    @endcan

    @if(count($tickets))
        @foreach($tickets as $ticket)
            <div class="card mb-4">
                <img class="card-img-top" src="{{ asset($ticket->image) }}" alt="Card image cap">
                <div class="card-body">
                    <h2 class="card-title">{{ $ticket->title }}</h2>
                    <small>Category:

                        @foreach($ticket->categories as $category)
                            <span class="label label-primary">{{ $category->name }}</span>
                        @endforeach

                    </small>
                    <p class="card-text">Status: {{ $ticket->status->label }}</p>
                    <a href="{{ route('ticket.show', [$ticket->id]) }}"
                       class="btn btn-primary">Read More →</a>
                </div>
                <div class="card-footer text-muted">
                    Posted on {{ $ticket->created_at->diffForHumans() }}
                    <a href="{{ route('user.show', ['id' => $ticket->user->id]) }}">{{ $ticket->user->name }}</a>
                </div>
            </div>

            @can('update', $ticket)
                <a href="{{ route('ticket.edit', ['id' => $ticket->id]) }}" class="btn btn-warning">Update</a>
            @endcan

            @can('delete', $ticket)
                {!! Form::open(['route' => ['ticket.destroy', 'id' => $ticket->id], 'method' => 'delete']) !!}
                <div class="form-group">
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                </div>
                {!! Form::close() !!}
            @endcan

            <hr>
        @endforeach

        {{ $tickets->links() }}

    @else
        <div class="card mb-4">
            Nothing here
        </div>
    @endif

@endsection
