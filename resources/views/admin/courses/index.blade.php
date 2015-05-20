@extends('app-menu')

@section('content')

<header>
    <div class="dropdown">
        <button id="dLabel" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            State: {{$state}}
            <span class="caret"></span>
        </button>
        <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
            <li><a href="{{URL::current().'?state='.\App\Zcourse::STATE_PENDING}}">{{\App\Zcourse::STATE_PENDING}}</a></li>
            <li><a href="{{URL::current().'?state='.\App\Zcourse::STATE_USING}}">{{\App\Zcourse::STATE_USING}}</a></li>
            <li><a href="{{URL::current().'?state='.\App\Zcourse::STATE_CLOSED}}">{{\App\Zcourse::STATE_CLOSED}}</a></li>
            <li><a href="{{URL::current().'?state='.\App\Zcourse::STATE_DISAPPROVED}}">{{\App\Zcourse::STATE_DISAPPROVED}}</a></li>
        </ul>
    </div>
</header>

<div>
    <table class="table">
        <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Pattern</th>
            <th>Status</th>
            <th>Applicant</th>
            <th>Operations</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($zcourses as $zcourse)
            <tr>
                <td>{{$zcourse->id}}</td>
                <td>{{$zcourse->name}}</td>
                <td>
                    {{$zcourse->zpattern->description}}
                    <span class="label label-default">{{count($zcourse->zpattern->zresources_available)}}</span>
                </td>
                <td>{{$zcourse->state}}</td>
                <td><a href="{{\URL::route('users.show', ['user' => \Auth::user()])}}">{{\Auth::user()->name}}</a></td>
                <td>@include ('admin.courses._index_operations')</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

@endsection