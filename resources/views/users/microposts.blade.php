@if (count($favorites) > 0)
    <ul class="list-unstyled">
        @foreach ($favorites as $favorite)
            <li class="media">
                <img class="mr-2 rounded" src="{{ Gravatar::src($favorite->user()->first()->email, 50) }}" alt="">
                <div class="media-body">
                    <div>
                        <a href="{{ route('users.show', ['id' => $favorite->user()->first()->id]) }}">{{ $favorite->user()->first()->name }}</a>
                        <p>{{ $favorite->content }}</p>
                    </div>
                    <div>
                        @if (Auth::user()->is_favorite($favorite->id))
                            {!! Form::open(['route' => ['favorites.unfavorite', $favorite->id], 'method' => 'delete']) !!}
                                {!! Form::submit('Unfavorite', ['class' => "btn btn-success"]) !!}
                            {!! Form::close() !!}
                        @else
                            {!! Form::open(['route' => ['favorites.favorite', $favorite->id]]) !!}
                                {!! Form::submit('Follow', ['class' => "btn btn-secondary"]) !!}
                            {!! Form::close() !!}
                        @endif
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
    
    {{ $favorites->links('pagination::bootstrap-4') }}
@endif