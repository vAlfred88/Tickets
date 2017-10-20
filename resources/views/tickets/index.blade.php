@extends('layouts.app')

@section('content')

    @if(count($tickets))
        @foreach($tickets as $ticket)
            <div class="card mb-4">
                <img class="card-img-top" src="{{ $ticket->image }}" alt="Card image cap">
                <div class="card-body">
                    <h2 class="card-title">{{ $ticket->title }}</h2>
                    <p class="card-text">Status: {{ $ticket->status->label }}</p>
                    <a href="{{ route('ticket.show', [$ticket->id]) }}"
                       class="btn btn-primary">Read More →</a>
                </div>
                <div class="card-footer text-muted">
                    Posted on {{ $ticket->created_at->diffForHumans() }}
                    <a href="#">{{ $ticket->user->name }}</a>
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
