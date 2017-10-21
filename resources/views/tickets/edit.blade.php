@extends('layouts.app')

@section('content')
    <h1>Add new ticket</h1>
    {!! Form::model($ticket, ['route' => ['ticket.update', 'id' => $ticket->id], 'method' => 'put', 'enctype' => 'multipart/form-data']) !!}

    @include('partials.forms.ticket')

    {!! Form::close() !!}
@endsection