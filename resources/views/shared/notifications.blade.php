<ul class="list-group">
    <li class="list-group-item">Welcome to Connection Coin!</li>
    @foreach( auth()->user()->unreadNotifications as $notification )

        <li class="list-group-item">
            <form method="POST" id="notif_form{{ $notification->id }}" action="/user/notifications">
                @csrf

                @if ( isset( $notification->data['url'] ) )

                    <input type="hidden" name="url" value="{{ $notification->data['url'] }}">
                @else
                    <input type="hidden" name="url" value="/stories/{{ $notification->data['story_id'] }}">
                @endif

                <input type="hidden" name="notif_id" value="{{ $notification->id }}">

                <img 
                    style="border-radius: 80%;" 
                    src="{{ asset('images/connectionc.png') }}" 
                    width="40" 
                    height="40">

                <a style="color: #3490dc !important; cursor: pointer;"
                     onclick="document.getElementById('notif_form{{ $notification->id }}').submit();"> 

                    @if ( isset( $notification->data['message'] ) )
                        {{ $notification->data['message'] }}
                    @else
                        @if( $notification->type == "App\Notifications\StoryReact" )
                            {{ $notification->data['user_first_name'] . " reacted on your story." }}
                        @else
                            {{ $notification->data['user_first_name'] . " commented on your story." }}
                        @endif
                    @endif
                </a>
            </form>
        </li>
    @endforeach
</ul>