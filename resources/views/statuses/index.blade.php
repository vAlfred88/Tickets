@extends('layouts.app')

@section('content')
    <h1>Статусы</h1>
    <hr>
    <a href="{{ route('status.create') }}" class="btn btn-primary">
        <i class="fa fa-plus"></i>
        Новый статус
    </a>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Название</th>
                <th>Описание</th>
                <th>&nbsp;</th>
            </tr>
            </thead>
            <tbody>
            @foreach($statuses as $status)
                <tr>
                    <td>{{ $status->id }}</td>
                    <td>{{ $status->name }}</td>
                    <td>{{ $status->label }}</td>
                    <td>
                        {!! Form::open(['route' => ['status.destroy', 'id' => $status->id], 'method' => 'delete', 'class' => 'form-inline']) !!}

                        <div class="form-group">
                            <a href="{{ route('status.edit', ['id' => $status->id]) }}"
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