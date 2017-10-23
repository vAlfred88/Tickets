<div class="form-group">
    {!! Form::label('name', 'Name') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('label', 'Label') !!}
    {!! Form::text('label', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::submit('Save', ['class' => 'form-control']) !!}
</div>