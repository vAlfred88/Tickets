@extends('layouts.app')

@section('content')
    <h1>Add new ticket</h1>
    {!! Form::open(['route' => ['ticket.store'], 'enctype' => 'multipart/form-data']) !!}

    <div class="form-group">
        {!! Form::label('image', 'Title') !!}
        {!! Form::file('image', null, ['class' => 'image']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('title', 'Title') !!}
        {!! Form::text('title', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('body', 'Body') !!}
        {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('category', 'Category') !!}
        {!! Form::select('categories[]', $categories, null, ['class' => 'form-control', 'multiple']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Save', ['class' => 'form-control']) !!}
    </div>

    {!! Form::close() !!}
@endsection