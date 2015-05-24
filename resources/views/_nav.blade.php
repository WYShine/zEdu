<?php
    if (!isset($nav_title)) $nav_title = '';
?>

<ul class="nav nav-pills nav-stacked">
    <li role="presentation" class={{$nav_title=="Home"?"active":""}}>
        <a href="{{URL::route('home')}}">Home</a>
    </li>
    <li role="presentation" class={{$nav_title=="Security"?"active":""}}>
        <a href="{{URL::route('home')}}">Security</a>
    </li>
    @if (Auth::user()->role === "teacher" || Auth::user()->role === "admin")
        <hr/>
        <li role="presentation" class={{$nav_title=="New Application"?"active":""}}>
            <a href="{{URL::route('teacher.courses.create')}}">New Application</a>
        </li>
        <li role="presentation" class={{$nav_title=="My Applications"?"active":""}}>
            <a href="{{URL::route('teacher.courses.index')}}">My Applications</a>
        </li>
    @endif
    @if (Auth::user()->role === "admin")
        <hr/>
        <li role="presentation" class={{$nav_title=="Applications"?"active":""}}>
            <a href="{{URL::route('admin.courses.index')}}">Applications</a>
        </li>
        <li role="presentation" class={{$nav_title=="Users"?"active":""}}>
            <a href="{{URL::route('admin.users.index')}}">Users</a>
        </li>
        <li role="presentation" class={{$nav_title=="Resources"?"active":""}}>
            <a href="{{URL::route('admin.resources.index')}}">Resources</a>
        </li>
        <li role="presentation" class={{$nav_title=="Demonstrition"?"active":""}}>
            <a href="{{URL::route('admin.demonstration.index')}}">Demonstration</a>
        </li>
    @endif
</ul>