@extends('app-menu')

@section('content')
    <h3>{{$zcourse->name}}</h3>
    <hr/>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Mainframe Information</h3>
        </div>
        <div class="panel-body">
            <ul>
                <li>IP: 127.0.0.1</li>
                <li>Port: 2999</li>
            </ul>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Teachers Account Information</h3>
        </div>
        <div class="panel-body">
            <ul>
                <li>ID: T099000-T099009</li>
                <li>Password: xxxxx</li>
            </ul>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Students Account Information</h3>
        </div>
        <div class="panel-body">
            <ul>
                <li>ID: T099000-T099009</li>
                <li>Password: xxxxx</li>
            </ul>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Subsystem Information</h3>
        </div>
        <div class="panel-body">
            <ul>
                <li>Start Command: /- D099 START DB2</li>
                <li>Stop Command: /- D099 STOP DB2</li>
            </ul>
        </div>
    </div>
@endsection