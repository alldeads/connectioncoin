<ul class="list-group">
    <li class="list-group-item">Welcome to Connection Coin!</li>
    @foreach( auth()->user()->unreadNotifications as $notification )

        <li class="list-group-item">
            <form method="POST" id="notif_form{{ $notification->id }}" action="/user/notifications">
                @csrf

                <input type="hidden" name="url" value="{{ $notification->data['url'] }}">

                <input type="hidden" name="notif_id" value="{{ $notification->id }}">

                <img style="border-radius: 80%;" src="http://fleischmen.com/wp-content/uploads/2017/11/user-avatar-placeholder.png" width="40" height="40">

                <a style="color: #3490dc !important; cursor: pointer;"
                     onclick="document.getElementById('notif_form{{ $notification->id }}').submit();"> 
                        {{ $notification->data['message'] }}
                </a>
            </form>
        </li>
    @endforeach
</ul>