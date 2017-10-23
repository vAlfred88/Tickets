@extends('layouts.app')

@section('content')
    <!-- Date/Time -->
    <p>Создано {{ $ticket->created_at->diffForHumans() }}
        пользователем
        <a href="{{ route('user.show', ['id' => $ticket->user->id]) }}">
            {{ $ticket->user->name }}
        </a>
    </p>

    <hr>

    <h2 class="mt-4">{{ $ticket->title }}
        <small>
        </small>
    </h2>
    <p>
        @unless($ticket->categories->isEmpty())

            @foreach($ticket->categories as $category)
                <span class="label label-primary">{{ $category->name }}</span>
            @endforeach

        @endunless
    </p>
    {{--todo: сделать проверку через политику--}}
    @if(auth()->guest() || auth()->user()->hasRole('user'))
        Status: <span class="label label-success">{{ $ticket->status->label }}</span>
    @elseif(auth()->user()->isAdmin())
        {!! Form::model($ticket, ['route' => ['ticket.update', 'id' => $ticket->id],
        'method' => 'put', 'class' => 'form-inline']) !!}

        @include('partials.forms.status')

        <div class="form-group">
            {!! Form::submit('Update', ['class' => 'form-control, btn btn-primary']) !!}
        </div>
        {!! Form::close() !!}
    @endif

    <hr>

    <!-- Preview Image -->
    @isset($ticket->image)
        <img class="img-fluid rounded" src="{{ asset($ticket->image) }}" alt="">
        <hr>
    @endisset

    <!-- Post Content -->
    <p class="lead">{{ $ticket->body }}</p>

    {{--<hr>--}}

    {{--<div class="card my-4">--}}
    {{--<h5 class="card-header">Leave a Comment:</h5>--}}
    {{--<div class="card-body">--}}
    {{--<form>--}}
    {{--<div class="form-group">--}}
    {{--<textarea class="form-control" rows="3"></textarea>--}}
    {{--</div>--}}
    {{--<button type="submit" class="btn btn-primary">Submit</button>--}}
    {{--</form>--}}
    {{--</div>--}}
    {{--</div>--}}

    {{--<div class="media mb-4">--}}
    {{--<img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">--}}
    {{--<div class="media-body">--}}
    {{--<h5 class="mt-0">Commenter Name</h5>--}}
    {{--Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio,--}}
    {{--vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec--}}
    {{--lacinia congue felis in faucibus.--}}
    {{--</div>--}}
    {{--</div>--}}

    {{--<div class="media mb-4">--}}
    {{--<img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">--}}
    {{--<div class="media-body">--}}
    {{--<h5 class="mt-0">Commenter Name</h5>--}}
    {{--Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio,--}}
    {{--vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec--}}
    {{--lacinia congue felis in faucibus.--}}

    {{--<div class="media mt-4">--}}
    {{--<img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">--}}
    {{--<div class="media-body">--}}
    {{--<h5 class="mt-0">Commenter Name</h5>--}}
    {{--Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras--}}
    {{--purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi--}}
    {{--vulputate fringilla. Donec lacinia congue felis in faucibus.--}}
    {{--</div>--}}
    {{--</div>--}}

    {{--<div class="media mt-4">--}}
    {{--<img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">--}}
    {{--<div class="media-body">--}}
    {{--<h5 class="mt-0">Commenter Name</h5>--}}
    {{--Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras--}}
    {{--purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi--}}
    {{--vulputate fringilla. Donec lacinia congue felis in faucibus.--}}
    {{--</div>--}}
    {{--</div>--}}

    {{--</div>--}}
    {{--</div>--}}


@endsection
