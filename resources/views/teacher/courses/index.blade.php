@extends('app-menu')

@section('content')
<table class="table">
    <thead>
       <tr>
           <th>#</th>
           <th>Name</th>
           <th>Resource</th>
           <th>Status</th>
           <th>Operations</th>
       </tr>
    </thead>
    <tbody>
        @foreach ($zcourses as $zcourse)
            <tr>
                <td>{{$zcourse->id}}</td>
                <td>{{$zcourse->name}}</td>
                <td>{{$zcourse->zpattern->description}}</td>
                <td>{{$zcourse->state}}</td>
                <td>@include ('teacher.courses._index_operations')</td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection