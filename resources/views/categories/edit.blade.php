@extends('layouts.app')

@section('content')
    <h1>Add new ticket</h1>
    {!! Form::model($category, ['route' => ['category.update', 'id' => $category->id], 'method' => 'put', 'enctype' => 'multipart/form-data']) !!}

    @include('partials.forms.category')

    {!! Form::close() !!}
@endsection