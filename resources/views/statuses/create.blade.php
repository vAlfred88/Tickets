@extends('layouts.app')

@section('content')
    <h1>Add new status</h1>
    {!! Form::open(['route' => ['status.store']]) !!}

    @include('partials.forms.status')

    {!! Form::close() !!}
@endsection