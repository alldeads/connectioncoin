<ul class="list-group">
    <li class="list-group-item">Welcome to Connection Coin!</li>
    @foreach( auth()->user()->unreadNotifications as $notification )

        <form method="POST" id="notif_form" action="/user/notifications">
            @csrf
            <input type="hidden" name="url" value="{{ "/stories/" . $notification->data['story_id'] }}">
            <input type="hidden" name="notif_id" value="{{ $notification->id }}">

            <li class="list-group-item">
                <img style="border-radius: 80%;" src="http://fleischmen.com/wp-content/uploads/2017/11/user-avatar-placeholder.png" width="40" height="40">

                @if ( $notification->type == "App\Notifications\StoryComment" )
                    <a style="color: #3490dc !important; cursor: pointer;" onclick="document.getElementById('notif_form').submit();"> 
                        {{ $notification->data['user_first_name'] . " commented on your story." }}
                    </a>

                @elseif( $notification->type == "App\Notifications\StoryReact" )

                    <a style="color: #3490dc !important; cursor: pointer;" onclick="document.getElementById('notif_form').submit();"> 
                        {{ $notification->data['user_first_name'] . " reacted on your story." }}
                    </a>
                @endif
            </li>
        </form>
    @endforeach
</ul>