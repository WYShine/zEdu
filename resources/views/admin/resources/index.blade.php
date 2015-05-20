@extends('app-menu')

@section('content')
    <header>
        <div class="dropdown">
            <button id="dLabel" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                State: {{$state}}
                <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
                <li><a href="{{URL::current().'?state='.\App\Zresource::STATE_PENDING}}">{{\App\Zcourse::STATE_PENDING}}</a></li>
                <li><a href="{{URL::current().'?state='.\App\Zresource::STATE_USING}}">{{\App\Zcourse::STATE_USING}}</a></li>
                <li><a href="{{URL::current().'?state='.\App\Zresource::STATE_CLOSED}}">{{\App\Zcourse::STATE_CLOSED}}</a></li>
                <li><a href="{{URL::current().'?state='.\App\Zresource::STATE_AVAILABLE}}">{{\App\Zcourse::STATE_DISAPPROVED}}</a></li>
            </ul>
        </div>
    </header>

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