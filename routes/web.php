<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Coin;
use App\Message;
use App\Role;
use App\Story;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

Route::get('stories', function () {
    return redirect('/home');
});

Route::get('/home', function () {
    return redirect('/');
});

Route::get('/api/testapi', 'MainController@index');

Route::get('/feed', 'StoryController@index')->name('stories.index');

Auth::routes(['verify' => true]);

// Route::get('/home', 'HomeController@index')->name('home')->middleware(['verified']);

// Route::get('/', function () {
//     return view('twitter');
// })->middleware(['web', 'guest']);

Route::get('/', 'StoryController@twitter');

Route::resource('connections', 'Coin\ConnectionController');
Route::get('stories/create', 'StoryController@create')->name('stories.create');
Route::post('stories', 'StoryController@store')->name('stories.store');

Route::middleware(['auth', 'verified', 'role:admin|client'])->group(function () {

    Route::get('stories/{story}', 'StoryController@show')->name('stories.show');
    Route::get('stories/{story}/edit', 'StoryController@edit')->name('stories.edit');
    Route::match(['put', 'patch'], 'stories/{story}', 'StoryController@update')->name('stories.update');
    Route::delete('stories/{story}', 'StoryController@destroy')->name('stories.destroy');

    // Route::get('/conversations/{user_id}', 'MessageController@getMessagesFor');

    Route::get('users/info/{user}', function ($user) {
        if ((int) $user == auth()->id()) {
            abort(404);
        }
        return response()->json(User::findOrFail($user), 200);
    });

    Route::resource('users', 'UserController')->except(['edit', 'update', 'show']);

    Route::resource('messages', 'MessageController')->except(['show']);

    Route::resource('coins', 'CoinController');

    Route::get('messages/{message?}', 'MessageController@show')->name('messages.show');

    Route::resource('comments', 'CommentController');

    Route::post('/like/story', 'StoryLikeController@store');

    Route::post('/user/notifications', 'NotificationController@index');

    Route::post('/wordpress/store', 'WordPressStoreController@store')->name('wordpress_store.store');

    Route::post('/report/story', 'ReportStoryController@store')->name('report.story');

});

Route::middleware(['auth', 'role:admin|client'])->group(function () {
    Route::resource('users', 'UserController')->only('edit', 'update');
});


Route::get('users/{user}/coins', 'ShowUserCoinsController')->name('users.coins.index');

Route::get('users/{user}/stories', 'ShowUserStoriesController')->name('users.stories.index');
Route::get('users/coins/{coin}/stories', 'ShowUserCoinsController@get_coin_stories')->middleware('auth');

Route::get('track/{coin}/coin/', 'ShowUserCoinsController@get_coin_location');

Route::get('users/{user}', 'UserController@show')->name('users.show');

Route::get('api/coin/{coin_id}', function ( $coin_id ) {
    $client = new \GuzzleHttp\Client();
    $arr = [];

    $stories = Story::where('coin_id', $coin_id)->limit(1)->orderBy('created_at', 'desc')->get();

    foreach ($stories as $story) {
        $response = $client->request('GET', 'https://maps.googleapis.com/maps/api/geocode/json?address=' . $story->city . ',' . $story->state . ',' . $story->country . '&key=AIzaSyBtlMpCUG3d_9DRX9ANhv753HRnTHHaX9g');
        $body = json_decode($response->getBody());
        $lat = isset($body->results[0]) ? $body->results[0]->geometry->location->lat : 0;
        $lng = isset($body->results[0]) ? $body->results[0]->geometry->location->lng : 0;

        $arr[] = [
            'title' => $story->title,
            'id' => $story->id,
            'lat' => $lat,
            'lng' => $lng
        ];
    }

    return response()->json($arr);
});

Route::get('api/stories', function () {
    $client = new \GuzzleHttp\Client();
    $stories = Story::all();
    $arr = [];

    foreach ($stories as $story) {
        $response = $client->request('GET', 'https://maps.googleapis.com/maps/api/geocode/json?address=' . $story->city . ',' . $story->state . ',' . $story->country . '&key=AIzaSyBtlMpCUG3d_9DRX9ANhv753HRnTHHaX9g');
        $body = json_decode($response->getBody());
        $lat = isset($body->results[0]) ? $body->results[0]->geometry->location->lat : 0;
        $lng = isset($body->results[0]) ? $body->results[0]->geometry->location->lng : 0;

        $arr[] = [
            'title' => $story->title,
            'id' => $story->id,
            'lat' => $lat,
            'lng' => $lng
        ];
    }

    return response()->json($arr);
});

Route::get('testlayout', function () {
    return view('twitter');
});

Route::get('api/customers/email', 'UserController@get_users')->middleware('auth');
Route::post('api/customers/email', 'UserController@get_users')->middleware('auth');

Route::get('search', function () {
    // $stories = Story::all();
    $stories = [];
    return view('map.index', ['stories' => $stories]);
})->name('coins.search');

Route::get('testmap', function () {
    return view('testmap');
});

Route::get('/privacy', function () {
    return view('privacy');
} );

Route::get('/terms', function () {
    return view('terms');
} );