@if ($state === 'pending')
    {!! Form::open([
    'class' => 'form-inline form-inline-self',
    'method' => 'PUT',
    'url' => '/admin/resources/' . $zresource->id
    ]) !!}
    {!!Form::hidden('state','available')!!}
    <div class="form-group">
        {!! Form::submit('Activate', ['class'=>'btn btn-sm btn-link']) !!}
    </div>
    {!! Form::close() !!}
@endif