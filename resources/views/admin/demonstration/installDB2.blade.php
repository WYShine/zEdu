@extends('app-menu')

@section('content')
<div class="row">
        <div class="col-md-6">
            {!! Form::open(['route' => 'admin.demonstration.store']) !!}
            <div class="form-group">
                {!! Form::label('DB2_id', 'DB2 ID:') !!}
                {!! Form::text('DB2_id', null, [
                'class'=>'form-control', 
				'placeholder' => '"C101"'		
                ]) !!}
            </div>
            <div style="visibility:hidden">
	            {!! Form::text('type', 'iDB2') !!}
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