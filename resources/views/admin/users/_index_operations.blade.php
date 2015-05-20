@if ($user->role === 'user')
{!! Form::open([
'class' => 'form-inline form-inline-self',
'method' => 'PUT',
'url' => '/admin/users/' . $user->id
]) !!}
{!!Form::hidden('role','teacher')!!}
<div class="form-group">
    {!! Form::submit('Set as teacher', ['class'=>'btn btn-sm btn-link']) !!}
</div>
{!! Form::close() !!}
@endif