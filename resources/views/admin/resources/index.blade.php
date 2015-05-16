@extends('app-menu')

@section('content')
    <table class="table">
        <thead>
        <tr>
            <th>Resource ID</th>
            <th>Pattern ID</th>
            <th>Pattern</th>
            <th>State</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($zresources as $zresource)
            <tr>
                <td>{{$zresource->id}}</td>
                <td>{{$zresource->zpattern->id}}</td>
                <td>{{$zresource->zpattern->description}}</td>
                <td>{{$zresource->state}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection