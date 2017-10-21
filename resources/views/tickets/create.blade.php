@extends('layouts.app')

@section('content')
    <h1>Add new ticket</h1>
    {!! Form::open(['route' => ['ticket.store'], 'enctype' => 'multipart/form-data']) !!}

    @include('partials.forms.ticket')

    {!! Form::close() !!}
@endsection