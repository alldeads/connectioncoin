<ul class="list-inline list-connection-users">
    <!-- changed from reverse to all -->
    @foreach ($story->getTheLastUsersWhoPostedUsingThisCoin(10)->all() as $index => $user)
        <li class="list-inline-item py-2 {{ $index > 9 ? 'd-none' : '' }}">
            <a href="{{ route('users.show', ['user' => $user]) }}">
                <img src="{{ $user->thePhoto }}" title="{{ $user->getFullName() }}" alt="{{ $user->getFullName() }}" class="img-thumbnail rounded-circle" style="width: 55px; height: 55px; margin-right: 5px; border: 4px solid {{ "#" . ltrim($user->getMilestone( $user->connection_made ), "d") }};">
            </a>
        </li>
    @endforeach
    <li class="list-inline-item py-2 ml-2 {{ $index > 9 ? '' : 'd-none' }}">
        <a href="#" class="see-more-connections">See more</a>
    </li>
</ul>