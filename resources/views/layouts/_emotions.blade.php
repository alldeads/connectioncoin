<hr>
<ul class="list-inline emotions" style="margin-bottom: -25px;">
    <li> {{ $story->getTotalReactions( $story->id ) }} reactions</li>
    @foreach (getEmotions() as $reaction_id => $emotion)
        <li class="list-inline-item">
            <a
                href="#"
                data-reaction="{{ $reaction_id }}"
                data-story-id="{{ $story->id }}"
                @auth
                    @if ($liked = auth()->user()->likedTheStory($story->id, $reaction_id))
                        @if ($liked->reaction_id == $reaction_id)
                            style = 'color: blue;'
                        @else
                            style = 'color: #0085ad;'
                        @endif
                    @else
                        style = 'color: #0085ad;'
                    @endif
                @else
                    style = 'color: #0085ad;'
                @endauth

                data-toggle="popover" data-placement="top" data-content="{{ $emotion['title'] }}"
            >

            @auth
                @if ($liked = auth()->user()->likedTheStory($story->id, $reaction_id))
                    @if ($liked->reaction_id == $reaction_id && $reaction_id == 4)
                        <img class="connection_emoji" src="{{ asset('images/connection_on.jpg') }}" alt="Connection">
                    @else
                        {!! $emotion['icon'] !!}
                    @endif
                @else
                    {!! $emotion['icon'] !!}
                @endif
            @else
                {!! $emotion['icon'] !!}
            @endauth
            </a>
        </li>
    @endforeach
</ul>