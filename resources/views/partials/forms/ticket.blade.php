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
    {!! Form::label('categories_list', 'Category') !!}
    {!! Form::select('categories_list[]', $categories, null, ['class' => 'form-control', 'multiple']) !!}
</div>

<div class="form-group">
    {!! Form::submit('Save', ['class' => 'form-control']) !!}
</div>