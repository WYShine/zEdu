@if ($state === 'pending')
    {!! Form::open([
    'class' => 'form-inline form-inline-self',
    'method' => 'PUT',
    'url' => '/admin/courses/' . $zcourse->id
    ]) !!}
    {!!Form::hidden('state','disapproved')!!}
    <div class="form-group">
        <button class="btn btn-sm btn-link" type="submit"
                data-toggle="tooltip" data-placement="right" title="Disapprove">
            <span class="glyphicon glyphicon-remove glyphicon-with-right-margin"></span>
        </button>
    </div>
    {!! Form::close() !!}

    @if (count($zcourse->zpattern->zresources) > 0)
        {!! Form::open([
        'class' => 'form-inline form-inline-self',
        'method' => 'PUT',
        'url' => '/admin/courses/' . $zcourse->id
        ]) !!}
        {!!Form::hidden('state','using')!!}
        <div class="form-group">
            <button class="btn btn-sm btn-link" type="submit"
                    data-toggle="tooltip" data-placement="right" title="Approve">
                <span class="glyphicon glyphicon-ok glyphicon-with-right-margin"></span>
            </button>
        </div>
        {!! Form::close() !!}
    @else
        <!-- stupid -->
    @endif
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