@if ($zcourse->state === \App\Zcourse::STATE_PENDING)
    <a href>Close</a>
@endif

@if ($zcourse->state === \App\Zcourse::STATE_USING)
    <a href="{{URL::route('teacher.courses.show', ['course' => $zcourse])}}">View</a>
@endif