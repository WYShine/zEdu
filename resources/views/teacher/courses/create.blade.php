@extends('app-menu')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <p>You can still apply <strong>4</strong> times.</p>

            {!! Form::open(['route' => 'teacher.courses.store']) !!}
            <div class="form-group">
                {!! Form::label('name', 'Name:') !!}
                {!! Form::text('name', null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('application_note', 'Notes:') !!}
                {!! Form::textarea('application_note', null, [
                'class' => 'form-control',
                'rows' => 3,
                'placeholder' => 'Leave a message here'
                ]) !!}
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('pattern_id', 'Resource:') !!}
                        @foreach($zpatterns as $zpattern)
                            <div class="radio">
                                <label>
                                    {!! Form::radio('zpattern_id', $zpattern->id) !!} {{$zpattern->description}}
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('capacity', 'Capacity:') !!}
                        <div class="radio">
                            <label data-toggle="tooltip" data-placement="left" title="10 teacher accounts; 10 student accounts">
                                {!! Form::radio('capacity', 'small', false) !!} Small
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
                <div class="col-md-3">
                    <div class="form-group">
                        {!! Form::submit('Submit', ['class'=>'btn btn-primary form-control']) !!}
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection