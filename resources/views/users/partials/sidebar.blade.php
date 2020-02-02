<div id="profile_sidebar" class="card bg-light text-white border-0">
    <img src="{{ $user->theCoverPhoto }}" alt="Card image" width="100%" style="border-radius: 2%;">
    <div class="card text-dark">
        <div class="d-flex align-items-end flex-column bd-highlight mb-3" style="height: 100%; width: 100%;">

            <div class="mt-auto p-2 bd-highlight w-100">
                <div class="row justify-content-left">
                    <div class="col-lg-4 mt-4 text-left">
                        <ul class="list-group list-group-horizontal mb-2 text-center">
                            @if ($user->socialmedialinks)
                                @if ($user->socialmedialinks->facebook)
                                    <li class="list-group-item">
                                        <a href="{{ $user->getSocialMediaUrl($user->socialmedialinks->facebook) }}" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                    </li>
                                @endif
                                @if ($user->socialmedialinks->twitter)
                                    <li class="list-group-item">
                                        <a href="{{ $user->getSocialMediaUrl($user->socialmedialinks->twitter) }}" target="_blank"><i class="fab fa-twitter"></i></a>
                                    </li>
                                @endif
                                @if ($user->socialmedialinks->linkedin)
                                    <li class="list-group-item">
                                        <a href="{{ $user->getSocialMediaUrl($user->socialmedialinks->linkedin) }}" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                                    </li>
                                @endif
                                @if ($user->socialmedialinks->instagram)
                                    <li class="list-group-item">
                                        <a href="{{ $user->getSocialMediaUrl($user->socialmedialinks->instagram) }}" target="_blank"><i class="fab fa-instagram"></i></a>
                                    </li>
                                @endif
                            @endif
                            @can('update', $user)
                                <li class="list-group-item">
                                        <a href="{{ route('users.edit', ['user' => $user]) }}" style="border-radius: 50px;"><i class="fas fa-edit"></i></a>
                                </li>
                            @endcan
                        </ul>
                    </div>
                </div>

                <div class="card" style="border-radius: 1.25rem;">
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-lg-4 mt-4 text-center">

                                <div class="progressone {{ $user->getMilestone( $user->connection_made ) }}">
                                    <span class="progressone-left">
                                        <span class="progressone-bar"></span>
                                    </span>
                                    <span class="progressone-right">
                                        <span class="progressone-bar"></span>
                                    </span>
                                    <div class="progressone-value">
                                        <img src="{{ $user->thePhoto }}" style="border-radius: 100%; width: 250px;" class="img-responsive">
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-8 mt-3">
                                <div class="row justify-content-center">

                                    <div class="col-md-12 text-center">
                                        <h3 class="text-black">{{ $user->first_name }}<br />{{ $user->last_name }}</h3>

                                        @if ( ! is_null($user->bio))
                                            <h6 class="mb-3 text-black">{{ $user->bio }}</h6>
                                        @endif
                                    </div>

                                    <div class="col-md-12 text-center mt-3">
                                        <ul class="list-inline">
                                            <li class="list-inline-item">
                                                <span>{{ $user->coin_given }}</span>
                                                <p>Coins Given</p>
                                            </li>
                                            <li class="list-inline-item">
                                                <span>{{ $user->connection_made }}</span>
                                                <p>Connections Made</p>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card d-none d-sm-block mt-2" style="border-radius: 1.25rem;">
                    <div class="card-body">
                        <div class="d-flex flex-row justify-content-center" style="position: relative; z-index: 1;">

                            @can('update', $user)
                                <div class="p-2 text-center">
                                    <a href="{{ route('users.coins.index', ['user' => $user]) }}" class="btn btn-block btn-outline-secondary mt-3" style="border-radius: 50px;"><i class="fas fa-coins"></i> Coins</a>
                                </div>
                            @endcan

                            @can('message-user', $user)
                                <div class="p-2 text-center">
                                    <a href="{{ route('messages.index', ['user' => $user]) }}" class="btn btn-block btn-outline-success mt-3" style="border-radius: 50px;"><i class="fas fa-paper-plane"></i> Message</a>
                                </div>
                            @endcan

                            <div class="p-2 text-center">
                                <a href="{{ route('users.stories.index', ['user' => $user]) }}" class="btn btn-block btn-outline-primary mt-3" style="border-radius: 50px;"><i class="fas fa-book"></i> Stories</a>
                            </div>
                            <!--/col-->
                        </div>
                        <!--/row-->
                    </div>
                    <!--/card-block-->
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card d-block d-sm-none mt-2" style="border-radius: 1.25rem;">
    <div class="card-body">
        <div class="row">
            <div class="col-12 col-lg-4 text-center">
                @can('message-user', $user)
                    <a href="{{ route('messages.index', ['user' => $user]) }}" class="btn btn-block btn-outline-success mt-3" style="border-radius: 50px;"><i class="fas fa-paper-plane"></i> Message</a>
                @endcan
            </div>
            <div class="col-12 col-lg-4 text-center">
                <a href="{{ route('users.coins.index', ['user' => $user]) }}" class="btn btn-block btn-outline-secondary mt-3" style="border-radius: 50px;"><i class="fas fa-coins"></i> Coins</a>
            </div>
            <div class="col-12 col-lg-4 text-center">
                <a href="{{ route('users.stories.index', ['user' => $user]) }}" class="btn btn-block btn-outline-primary mt-3" style="border-radius: 50px;"><i class="fas fa-book"></i> Stories</a>
            </div>
            <!--/col-->
        </div>
        <!--/row-->
    </div>
    <!--/card-block-->
</div>
