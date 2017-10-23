@extends('layouts.app')

@section('content')
    <h1>Add new category</h1>
    {!! Form::open(['route' => ['category.store']]) !!}

    @include('partials.forms.category')

    {!! Form::close() !!}
@endsection