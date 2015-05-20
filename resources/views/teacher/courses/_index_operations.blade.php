<a class="btn btn-sm btn-link" href="{{URL::route('teacher.courses.show', ['course' => $zcourse])}}">Details</a>

@if ($zcourse->state === \App\Zcourse::STATE_PENDING)
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
