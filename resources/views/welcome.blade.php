@extends('layouts.app')

@section('content')

    <h1 class="my-4">Тикеты
        <small>полный список</small>
    </h1>

    @foreach($tickets as $ticket)
        <div class="card mb-4">
            <img class="card-img-top" src="{{ $ticket->image }}" alt="Card image cap">
            <div class="card-body">
                <h2 class="card-title">{{ $ticket->title }}</h2>
                <p class="card-text">{{ $ticket->body }}</p>
                <a href="#" class="btn btn-primary">Read More →</a>
            </div>
            <div class="card-footer text-muted">
                {{ $ticket->created_at->diffForHumans() }}
                <a href="#">Start Bootstrap</a>
            </div>
        </div>

        <hr>
    @endforeach

    <ul class="pagination justify-content-center mb-4">
        <li class="page-item">
            <a class="page-link" href="#">← Older</a>
        </li>
        <li class="page-item disabled">
            <a class="page-link" href="#">Newer →</a>
        </li>
    </ul>

@endsection
