<?php

namespace App\Http\Controllers;

use App\User;
use App\Story;
use Illuminate\Http\Request;

class ShowUserCoinsController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, $user_id = null)
    {
        $this->views['user'] = $user = User::findOrFail($user_id);

        $this->authorize('update', $user);

        $this->views['stories'] = $user->stories()->withTrashed()->select('coin_id')->where('user_id', $user->id)->groupBy('coin_id')->get();

        return view('users.coins.index', $this->views);
    }

    public function get_coin_stories( $coin_id )
    {
        $this->views['user'] = $user = auth()->user();

        $this->views['stories'] = Story::withTrashed()->where('coin_id', $coin_id)
                                                    ->where('title', '!=', '')
                                                    ->get();

        return view('users.stories.index', $this->views);
    }

    public function get_coin_location( $coin_id )
    {
        $this->views['user'] = $user = auth()->user();

        $this->views['coin_id'] = $coin_id;

        return view('map.track', $this->views);
    }
}
