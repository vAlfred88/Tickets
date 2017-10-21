@extends('layouts.app')

@section('content')
    <h1>Add new ticket</h1>
    {!! Form::open(['route' => ['category.store'], 'enctype' => 'multipart/form-data']) !!}

    @include('partials.forms.category')

    {!! Form::close() !!}
@endsection