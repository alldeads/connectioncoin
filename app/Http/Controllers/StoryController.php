<?php

namespace App\Http\Controllers;

use App\Mail\NotifyOwnerOfTheCoin;
use App\Story;
use App\Coin;
use App\StoryImage;
use App\User;
use Gate;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Spatie\Image\Image;
use Spatie\Image\Manipulations;

class StoryController extends Controller
{

    public function __construct(Coin $coin)
    {
        $this->coin = $coin;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->views['stories'] = Story::where('description', '!=', '')->orderBy('created_at', 'desc')->paginate(10);

        return view('feed', $this->views);

    }

    public function twitter()
    {
        if ( Auth::check() ) {

            return redirect('/feed');
        }

        $this->views['stories'] = Story::where('description', '!=', '')->orderBy('created_at', 'desc')->take(4)->get();

        return view('twitter', $this->views);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        if (Auth::check()) {
            if (Gate::denies('create', Story::class)) {
                return redirect()->route('connections.create')->withErrors('Unable to create story: Please make sure that the coin you entered is valid and if you\'re not the one who last posted a story using this coin.');
            }
        } else {
            $request = \Request::has('number') && \Request::has('phrase');
            $coin = $this->coin->exists(\Request::input('number'), \Request::input('phrase'));
            $lastPost = true;

            if (! ($request && $coin && $lastPost)) {
                return redirect()->route('connections.create')->withErrors('Unable to create story: Please make sure that the coin you entered is valid and if you\'re not the one who last posted a story using this coin.');
            }
        }

        return view('stories.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // if (Auth::check()) {
        //     $this->authorize('create', Story::class);
        // }

        if (Auth::check()) {
            $this->validate($request, [
                'title' => 'required|min:3',
                'description' => 'required|min:5',
                'image' => 'required',
                'image.*' => 'image|dimensions:min_width=250,min_height:500',
            ], ['image.dimensions' => 'Please upload an image that has a minimum width of 250px and minimum height of 500px']);
        } else {
            if (! $request->has('create_account')) {
                $this->validate($request, [
                    'title' => 'required|min:3',
                    'description' => 'required|min:5',
                    'image' => 'required',
                    'image.*' => 'image|dimensions:min_width=250,min_height:500',
                    'nickname' => 'required|min:5|unique:users,nickname',
                ], ['image.dimensions' => 'Please upload an image that has a minimum width of 250px and minimum height of 500px']);
            } else {
                $this->validate($request, [
                    'first_name' => ['required', 'string', 'max:255'],
                    'last_name' => ['required', 'string', 'max:255'],
                    'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                    'password' => ['required', 'string', 'min:8', 'confirmed'],
                    'title' => 'required|min:3',
                    'description' => 'required|min:5',
                    'image' => 'required',
                    'image.*' => 'image|dimensions:min_width=250,min_height:500',
                ], ['image.dimensions' => 'Please upload an image that has a minimum width of 250px and minimum height of 500px']);
            }
        }

        $coin_id = $this->coin->exists($request->input('number'), $request->input('phrase'))->id;

        if (! Auth::check()) {
            if (! $request->has('create_account')) {
                $user = User::create([
                    'first_name' => null,
                    'last_name' => null,
                    'email' => null,
                    'password' => null,
                    'nickname' => $request->input('nickname'),
                ]);

                $user_id = $user->id;
            } else {
                $user = User::create([
                    'first_name' => $request->input('first_name'),
                    'last_name' => $request->input('last_name'),
                    'email' => $request->input('email'),
                    'password' => Hash::make($request->input('password')),
                ]);

                event(new Registered($user));

                $user_id = $user->id;
            }
        } else {
            $user_id = auth()->id();
        }

        $attributes = array_merge(
            [
                'user_id' => $user_id,
                'coin_id' => $coin_id
            ],
            $request->only('title', 'description', 'city', 'state', 'province', 'country')
        );

        // Validate possible duplicate story

        try {

            $story = Story::where(['user_id' => $user_id, 'coin_id' => $coin_id])->get();

            if ( count( $story->toArray() ) > 0 ) {
                return redirect()->back()->withErrors("Oops! Coin is already in use.");
            }

            // Validate title and description
            $story = Story::where(['title' => $request->input('title'), 'description' => $request->input('description')])->get();

            if ( count( $story->toArray() ) > 0 ) {
                return redirect()->back()->withErrors("Oops! Possible Duplicate Story.");
            }

            $story = Story::create($attributes);

            // Update user connection made

            $related = Story::where('coin_id', $coin_id)->orderBy('created_at', 'desc')->get();
            $related = $related->toArray();

            if ( isset( $related[1] ) ) {

                $related_user = User::find( $related[1]['user_id'] );

                $related_user->connection_made += 1;
                $related_user->coin_given += 1;

                $related_user->save();
            }

            if ( $request->hasFile('image') ) {

                $images = $request->file('image');

                foreach ( $images as $image ) {
                    
                    $filenameWithExtension = $image->getClientOriginalName();
                    $filename = pathinfo($filenameWithExtension, PATHINFO_FILENAME);
                    $extension =$image->getClientOriginalExtension();
                    $time = time();
                    $filenameToStore = $filename . '_' . $time . '.' . $extension;
                    $filenameToStoreResize = $filename . '_' . $time . '-497x290.' . $extension;

                    $image->storeAs('public/story/images', $filenameToStore);

                    // Image::make(storage_path('app/public/story/images/' . $filenameToStore))->resize(650, null, function ($constraint) {
                    //        $constraint->aspectRatio(); //to preserve the aspect ratio
                    //        $constraint->upsize();
                    // })->save(storage_path('app/public/story/images/' . $filenameToStoreResize));

                    // Image::load(storage_path('app/public/story/images/' . $filenameToStore))
                    //     ->fit(Manipulations::FIT_FILL, 497, 290)
                    //     ->save(storage_path('app/public/story/images/' . $filenameToStoreResize));

                    Story::correctImageOrientation( storage_path('app/public/story/images/' . $filenameToStore) );

                    StoryImage::create([
                        'story_id' => $story->id, 
                        'filepath' => 'public/story/images/' . $filenameToStore
                    ]);
                }
            }

            $story = Story::where('coin_id', $coin_id)->oldest()->first();
            $coinOwner = $story->user;

            if ( $coinOwner->email ) {
                Mail::to($coinOwner->email)->send(
                    new NotifyOwnerOfTheCoin($story)
                );
            }

        } catch( \Exception $e ) {

            return redirect('/feed');
        }

        return redirect()->route('stories.index')->with('success', 'Story has been added.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Story  $story
     * @return \Illuminate\Http\Response
     */
    public function show(Story $story)
    {
        $this->views['story'] = $story;
        $this->views['comments'] = $story->find($story->id)->comments()->with('user')->get();
        $this->views['relatedStories'] = $story->where('id', '!=', $story->id)
                                                ->where('coin_id', $story->coin_id)
                                                ->where('description', '!=', '')
                                                ->latest()->get();

        return view('stories.show', $this->views);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Story  $story
     * @return \Illuminate\Http\Response
     */
    public function edit(Story $story)
    {

        $this->authorize('update', $story);

        $this->views['story'] = $story;
        return view('stories.edit', $this->views);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Story  $story
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Story $story)
    {
        $this->validate($request, [
            'title' => 'required|min:3',
            'description' => 'required|min:5',
            'image' => 'nullable',
            'image.*' => 'image|dimensions:min_width=250,min_height:500',
        ], ['image.dimensions' => 'Please upload an image that has a minimum width of 250px and minimum height of 500px']);

        $story = Story::find($story->id);
        $story->user_id = auth()->id();
        $story->coin_id = $story->coin_id;
        $story->title = $request->input('title');
        $story->description = $request->input('description');
        $story->city = $request->input('city');
        $story->state = $request->input('state');
        $story->province = $request->input('province');
        $story->country = $request->input('country');
        $story->save();

        if ($request->hasFile('image')) {

            $storyImages = StoryImage::where('story_id',$story->id)->get();
            $storyImages = $storyImages->toArray();
            
            $images = $request->file('image');

            foreach ( $images as $key => $image ) {

                $filenameWithExtension = $image->getClientOriginalName();
                $filename = pathinfo($filenameWithExtension, PATHINFO_FILENAME);
                $extension =$image->getClientOriginalExtension();
                $time = time();
                $filenameToStore = $filename . '_' . $time . '.' . $extension;
                $filenameToStoreResize = $filename . '_' . $time . '-497x290.' . $extension;

                $image->storeAs('public/story/images', $filenameToStore);
                Image::load(storage_path('app/public/story/images/' . $filenameToStore))
                    ->fit(Manipulations::FIT_FILL, 497, 290)
                    ->save(storage_path('app/public/story/images/' . $filenameToStoreResize));

                Story::correctImageOrientation( storage_path('app/public/story/images/' . $filenameToStore) );

                if ( isset( $storyImages[$key] ) ) {
                    $img = StoryImage::find( $storyImages[$key]['id'] );
                    $img->filepath = 'public/story/images/' . $filenameToStore;
                    $img->save();
                } else {
                    StoryImage::create([
                        'story_id' => $story->id, 
                        'filepath' => 'public/story/images/' . $filenameToStore
                    ]);
                }
            }
        }

        return redirect()->back()->with('success', 'Story has been updated.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Story  $story
     * @return \Illuminate\Http\Response
     */
    public function destroy(Story $story)
    {
        $story->delete();

        return redirect('/')->with('success', 'Story has been deleted.');
    }
}
