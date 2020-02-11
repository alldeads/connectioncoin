<img src="{{ $user->thePhoto }}" 
	title="{{ $user->getFullName() }}" 
	alt="{{ $user->getFullName() }}" 
	class="img-thumbnail rounded-circle" 
	style="width: 55px; height: 55px; margin-right: 5px; border: 4px solid {{ "#" . ltrim($user->getMilestone( $user->connection_made ), "d") }};">