@if (Auth::id() != $user->id)
    @if (Auth::user()->is_favorite($micropost->id))
        {!! Form::open(['route' => ['user.unfavorite', Auth::user()->id], 'method' => 'delete']) !!}
            {!! Form::submit('Unfavorite', ['class' => "btn btn-primary btn-block"]) !!}
        {!! Form::close() !!}
    @else
        {!! Form::open(['route' => ['user.favorite', Auth::user()->id]]) !!}
            {!! Form::submit('Follow', ['class' => "btn btn-secondary btn-block"]) !!}
        {!! Form::close() !!}
    @endif
@endif