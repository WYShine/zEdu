@extends('app-menu')

@section('content')
    <header class="clearfix">
        <div class="pull-left dropdown">
            <button id="dLabel" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                State: {{$state}}
                <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
                <li><a href="{{URL::current().'?state='.\App\Zresource::STATE_PENDING}}">{{\App\Zresource::STATE_PENDING}}</a></li>
                <li><a href="{{URL::current().'?state='.\App\Zresource::STATE_USING}}">{{\App\Zresource::STATE_USING}}</a></li>
                <li><a href="{{URL::current().'?state='.\App\Zresource::STATE_CLOSED}}">{{\App\Zresource::STATE_CLOSED}}</a></li>
                <li><a href="{{URL::current().'?state='.\App\Zresource::STATE_AVAILABLE}}">{{\App\Zresource::STATE_AVAILABLE}}</a></li>
            </ul>
        </div>
        
        <div class="pull-right">
            <a href="{{URL::route('admin.resources.create')}}" class="btn btn-primary">
                <span class="glyphicon glyphicon-plus"></span> Create
            </a>
        </div>
    </header>

    <table class="table">
        <thead>
        <tr>
            <th>Resource ID</th>
            <th>Pattern ID</th>
            <th>Pattern</th>
            <th>State</th>
            <th>Operations</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($zresources as $zresource)
            <tr>
                <td>{{$zresource->id}}</td>
                <td>{{$zresource->zpattern->id}}</td>
                <td>{{$zresource->zpattern->description}}</td>
                <td>{{$zresource->state}}</td>
                <td>@include ('admin.resources._index_operations')</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection