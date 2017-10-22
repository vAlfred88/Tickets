@extends('layouts.app')

@section('content')
    <h1>Категории</h1>
    <hr>
    <a href="{{ route('category.create') }}" class="btn btn-primary">
        <i class="fa fa-plus"></i>
        Новая категория
    </a>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Название</th>
                <th>Slug</th>
                <th>&nbsp;</th>
            </tr>
            </thead>
            <tbody>
            @foreach($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->slug }}</td>
                    <td>
                        {!! Form::open(['route' => ['category.destroy', 'id' => $category->id], 'method' => 'delete', 'class' => 'form-inline']) !!}

                        <div class="form-group">
                            <a href="{{ route('category.edit', ['id' => $category->id]) }}"
                               class="btn-xs btn-primary">
                                <i class="fa fa-pencil"></i>
                            </a>
                        </div>

                        <div class="form-group">
                            <a href="#"
                               class="btn-xs btn-danger"
                               onclick="$(this).closest('form').submit()">
                                <i class="fa fa-trash"></i>
                            </a>
                        </div>

                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection