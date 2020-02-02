<?php

namespace App\Http\Controllers;

use App\StoryLike;
use App\Story;
use App\Notifications\StoryReact;
use Illuminate\Http\Request;

class StoryLikeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request)
    {
        // if ($request->ajax()) {
            $reaction_id = $request->input('reaction_id');
            $story_id = $request->input('story_id');

            $result = StoryLike::where(['story_id' => $story_id, 
                                    'user_id' => auth()->id(),
                                    'reaction_id' => $reaction_id
                                    ])->get();

            if ( count( $result->toArray() ) > 0 ) {

                return response()->json(['success' => false]);
            }

            $result = StoryLike::create(['story_id' => $story_id, 
                                'user_id' => auth()->id(),
                                'reaction_id' => $reaction_id
                                ]);

            $story = Story::find($story_id);
            $result['user_first_name'] = $story->user->first_name;

            if ( $story->user->id != auth()->id() ) {
                $story->user->notify( new StoryReact( $result ) );
            }

            return response()->json(['success' => true]);
        // }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\StoryLike  $storyLike
     * @return \Illuminate\Http\Response
     */
    public function show(StoryLike $storyLike)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\StoryLike  $storyLike
     * @return \Illuminate\Http\Response
     */
    public function edit(StoryLike $storyLike)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\StoryLike  $storyLike
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StoryLike $storyLike)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\StoryLike  $storyLike
     * @return \Illuminate\Http\Response
     */
    public function destroy(StoryLike $storyLike)
    {
        //
    }
}
