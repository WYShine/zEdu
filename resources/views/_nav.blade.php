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
        <li role="presentation" class={{$nav_title=="Applications Management"?"active":""}}>
            <a href="{{URL::route('admin.courses.index')}}">Applications Management</a>
        </li>
    @endif
</ul>