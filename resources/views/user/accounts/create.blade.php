@extends('app-menu')

@section('content')
    @if (!$user->zaccount)
        <h3>Apply temporary account</h3>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repudiandae tempore, nam accusamus natus deserunt
            vel,
            qui nesciunt tenetur quos praesentium vero, maiores esse accusantium obcaecati cupiditate suscipit dolores
            asperiores quisquam.
        </p>
        <p>
            You can apply for temporary account only once.
        </p>

        {!! Form::open(['route' => 'accounts.store']) !!}
        <br/>
        <div class="row">
            <div class="col-md-2">
                {!! Form::submit('Apply', ['class'=>'btn btn-primary form-control']) !!}
            </div>

        </div>
        {!! Form::close() !!}


    @else
        <h3>Apply temporary account</h3>
        <p><strong>Status: <span class="label label-success">Active</span></strong></p>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repudiandae tempore, nam accusamus natus deserunt
            vel, qui nesciunt tenetur quos praesentium vero, maiores esse accusantium obcaecati cupiditate suscipit
            dolores asperiores quisquam.
        </p>
        <ul>
            <li>Account ID: xxx</li>
            <li>Password: xxx</li>
            <li>Expires at: xxxx/xx/xx</li>
        </ul>
    @endif





@endsection