<?php

namespace App\Http\Controllers;

use Gate;
use App\Coin;
use App\Story;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CoinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->views['user'] = auth()->user();

        $coins = auth()->user()->stories()->withTrashed()->where('user_id', auth()->id())->get()->groupBy('coin_id');

        return view('coins.index', $this->views);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Coin $coin)
    {
        $this->validate($request, [
            'number' => 'required',
            'phrase' => 'required'
        ]);

        $coin = $coin->exists($request->input('number'), $request->input('phrase'));

        if ( $coin ) {

            if (Auth::check()) {
                if (Gate::denies('create', Story::class)) {
                    return redirect()->back()->withErrors('Unable to add coin: Please make sure that the coin you entered is valid and if you\'re not the one who last posted a story using this coin.');
                }
            } else {
                $request = \Request::has('number') && \Request::has('phrase');
                $coin = $this->coin->exists(\Request::input('number'), \Request::input('phrase'));
                $lastPost = true;

                if (! ($request && $coin && $lastPost)) {
                    return redirect()->back()->withErrors('Unable to add coin: Please make sure that the coin you entered is valid and if you\'re not the one who last posted a story using this coin.');
                }
            }

            Story::create([
                'user_id'     => auth()->user()->id,
                'coin_id'     => $coin->id,
                'title'       => '',
                'description' => ''
            ]);

            $related = Story::where('coin_id', $coin->id)->orderBy('created_at', 'desc')->get();
            $related = $related->toArray();

            if ( isset( $related[1] ) ) {

                $related_user = User::find( $related[1]['user_id'] );

                $related_user->coin_given += 1;

                $related_user->save();
            }

            return redirect()->back()->with('success', 'Coin has been added.');
        } else {
            return redirect()->back()->withErrors("Coin doesn't exists.");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
