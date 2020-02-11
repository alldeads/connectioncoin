<ul class="list-inline list-connection-users">
    <!-- changed from reverse to all -->
    @foreach ($story->getTheLastUsersWhoPostedUsingThisCoin(10)->all() as $index => $user)
        <li class="list-inline-item py-2 {{ $index > 9 ? 'd-none' : '' }}">
            <a href="{{ route('users.show', ['user' => $user]) }}">
                @include('shared.user-image', ['user' => $user])
            </a>
        </li>
    @endforeach
    <li class="list-inline-item py-2 ml-2 {{ $index > 9 ? '' : 'd-none' }}">
        <a href="#" class="see-more-connections">See more</a>
    </li>
</ul>