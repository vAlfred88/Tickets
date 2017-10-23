@extends('layouts.app')

@section('content')
    <h1>Edit category</h1>
    {!! Form::model($category, ['route' => ['category.update', 'id' => $category->id]]) !!}

    @include('partials.forms.category')

    {!! Form::close() !!}
@endsection