@if ($state === 'pending')
    {!! Form::open([
            'class' => 'form-inline form-inline-self',
            'method' => 'PUT',
            'url' => '/admin/courses/' . $zcourse->id
        ]) !!}
        {!!Form::hidden('state','using')!!}
        <div class="form-group">
            {!! Form::submit('Approve', ['class'=>'btn btn-primary btn-sm form-control']) !!}
        </div>
    {!! Form::close() !!}

    {!! Form::open([
    'class' => 'form-inline form-inline-self',
    'method' => 'PUT',
    'url' => '/admin/courses/' . $zcourse->id
    ]) !!}
    {!!Form::hidden('state','disapproved')!!}
    <div class="form-group">
        {!! Form::submit('Disapprove', ['class'=>'btn btn-primary btn-sm form-control']) !!}
    </div>
    {!! Form::close() !!}
@endif