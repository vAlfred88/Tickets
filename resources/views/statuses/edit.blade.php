@extends('layouts.app')

@section('content')
    <h1>Edit status</h1>
    {!! Form::model($status, ['route' => ['status.update', 'id' => $status->id], 'method' => 'put']) !!}

    @include('partials.forms.status')

    {!! Form::close() !!}
@endsection