<ul class="nav nav-pills nav-stacked">
    <li role="presentation" class={{$nav_title=="Home"?"active":""}}>
        <a href="{{URL::route('home')}}">Home</a>
    </li>
    @if (Auth::user()->role === "teacher")
        <li role="presentation" class={{$nav_title=="New Application"?"active":""}}>
            <a href="{{URL::route('teacher.courses.create')}}">New Application</a>
        </li>
    @endif
</ul>