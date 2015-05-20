@extends('app-menu')

@section('content')
    <h3>Profile - {{$user->name}}</h3>
    <hr/>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Basic Information</h3>
        </div>
        <div class="panel-body">
            <ul>
                <li>Email: {{$user->email}}</li>
                <li>Phone: {{$user->phone}}</li>
                <li>Gender: {{$user->gender}}</li>
            </ul>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Work Information</h3>
        </div>
        <div class="panel-body">
            <ul>
                <li>Organization: {{$user->organization}}</li>
                <li>Department: {{$user->department}}</li>
            </ul>
        </div>
    </div>
@endsection