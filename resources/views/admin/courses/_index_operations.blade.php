@if ($state === 'pending')
    @if (count($zcourse->zpattern->zresources) > 0)
    {!! Form::open([
            'class' => 'form-inline form-inline-self',
            'method' => 'PUT',
            'url' => '/admin/courses/' . $zcourse->id
        ]) !!}
        {!!Form::hidden('state','using')!!}
        <div class="form-group">
            {!! Form::submit('Approve', ['class'=>'btn btn-sm btn-link']) !!}
        </div>
    {!! Form::close() !!}
    @endif

    {!! Form::open([
    'class' => 'form-inline form-inline-self',
    'method' => 'PUT',
    'url' => '/admin/courses/' . $zcourse->id
    ]) !!}
    {!!Form::hidden('state','disapproved')!!}
    <div class="form-group">
        {!! Form::submit('Disapprove', ['class'=>'btn btn-sm btn-link']) !!}
    </div>
    {!! Form::close() !!}
@endif

@if ($state === 'using')
    {!! Form::open([
    'class' => 'form-inline form-inline-self',
    'method' => 'PUT',
    'url' => '/admin/courses/' . $zcourse->id
    ]) !!}
    {!!Form::hidden('state','closed')!!}
    <div class="form-group">
        {!! Form::submit('Close', ['class'=>'btn btn-sm btn-link']) !!}
    </div>
    {!! Form::close() !!}
@endif