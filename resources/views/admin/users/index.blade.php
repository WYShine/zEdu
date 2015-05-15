@extends('app-menu')

@section('content')
    <table class="table">
        <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Role</th>
            <th>Email</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td><a href="{{URL::route('users.show',['user'=>$user])}}">{{$user->name}}</a></td>
                <td>{{$user->role}}</td>
                <th>{{$user->email}}</th>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection