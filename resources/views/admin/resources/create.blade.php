@extends('app-menu')

@section('content')
    <h3>Resource Allocation</h3>

    <div class="row">
        <div class="col-md-6">
            {!! Form::open([
                'route' => 'admin.resources.store'
            ]) !!}
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('pattern_id', 'Resource:') !!}
                        <?php $i = 0; ?>
                        @foreach($patterns as $pattern)
                            <div class="radio">
                                <label>
                                    @if ($i == 0)
                                        {!! Form::radio('pattern', $pattern, true) !!} {{$pattern}}
                                    @else
                                        {!! Form::radio('pattern', $pattern, false) !!} {{$pattern}}
                                    @endif
                                </label>
                            </div>
                            <?php $i ++; ?>
                        @endforeach
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('capacity', 'Capacity:') !!}
                        <div class="radio">
                            <label data-toggle="tooltip" data-placement="left" title="10 teacher accounts; 10 student accounts">
                                {!! Form::radio('capacity', 'small', true) !!} Small
                            </label>
                        </div>
                        <div class="radio">
                            <label data-toggle="tooltip" data-placement="left" title="10 teacher accounts; 50 student accounts">
                                {!! Form::radio('capacity', 'medium', false) !!} Medium
                            </label>
                        </div>
                        <div class="radio">
                            <label data-toggle="tooltip" data-placement="left" title="10 teacher accounts; 100 student accounts">
                                {!! Form::radio('capacity', 'large', false) !!} Large
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('count', 'Count:') !!}
                        {!! Form::input('number', 'count', 1, ['class' => 'form-control']) !!}
                    </div>
                </div>
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