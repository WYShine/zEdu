@extends('app-menu')

@section('content')
    <h3>Resource Allocation</h3>

    <div class="row">
        <div class="col-md-6">
            {!! Form::open([
                'route' => 'admin.resources.store'
            ]) !!}
            <div class="form-group">
                {!! Form::label('pattern_id', 'Pattern:') !!}
                @foreach($zpatterns as $zpattern)
                    <div class="radio">
                        <label>
                            {!! Form::radio('zpattern_id', $zpattern->id) !!} {{$zpattern->description}}
                        </label>
                    </div>
                @endforeach
            </div>

            <div class="form-group">
                {!! Form::label('count', 'Count:') !!}
                {!! Form::input('number', 'count', 1, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        {!! Form::submit('Submit', ['class'=>'btn btn-primary form-control']) !!}
                    </div>
                </div>

            </div>
            {!! Form::close() !!}
        </div>
    </div>

@endsection