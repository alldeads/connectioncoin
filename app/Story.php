<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use File;
use App\StoryLike;

class Story extends Model
{

    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'coin_id',
        'title',
        'description',
        'city',
        'state',
        'province',
        'country',
        'latitude',
        'longitude',
    ];

    public function coin()
    {
        return $this->belongsTo('App\Coin');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function likes()
    {
        return $this->hasMany('App\StoryLike');
    }

    public function getPostedDate( $date )
    {
        return $date->diffForHumans(['options' => Carbon::JUST_NOW | Carbon::ONE_DAY_WORDS | Carbon::TWO_DAY_WORDS]);
    }

    public function getTheLastUsersWhoPostedUsingThisCoin($take = 2)
    {
        $coins = $this->withTrashed()->where('coin_id', $this->coin_id)
        ->select('user_id', 'coin_id')
        ->groupBy('user_id', 'coin_id')
        ->orderBy('created_at', 'desc')
        ->take($take)
        ->get();

        $users = $coins->map(function ($coin) {
            return  $coin->user;
        });

        return $users;
    }

    public function images()
    {
        return $this->hasMany('App\StoryImage');
    }

    public static function connections()
    {
        $connections = Story::where('description', '!=', '')->get();

        return count( $connections->toArray() );
    }

    public function getTotalReactions( $story_id )
    {
        $result = StoryLike::where('story_id', $story_id)->get();

        return count( $result->toArray() );
    }

    public function getTheIsPostedOrUpdatedDatePrefixAttribute()
    {
        $suffix = $this->created_at == $this->updated_at ? 'Posted' : 'Last updated';

        return $suffix;
    }

    public function getTheDescriptionAttribute()
    {
        return Str::limit($this->description, '100', '<br /><a href="' . route('stories.show', ['story' => $this->id]) . '">Read more</a>');
    }

    public function getTheFormattedTimeAgoAttribute()
    {
        return $this->theIsPostedOrUpdatedDatePrefix . ' ' . $this->created_at->diffForHumans();
    }

    public function getTheImageAttribute()
    {
        if (isset($this->image->filepath)) {
            return Storage::url($this->image->filepath);
        } else {
            return 'https://www.sylvansport.com/wp/wp-content/uploads/2018/11/image-placeholder-1200x800.jpg';
        }
    }

    public function getTheResizedImageAttribute()
    {
        if (isset($this->image->filepath)) {

            $filename = pathinfo(storage_path('app/' . $this->image->filepath), PATHINFO_FILENAME);
            $extension = pathinfo(storage_path('app/' . $this->image->filepath), PATHINFO_EXTENSION);

            if (File::exists(storage_path('app/public/story/images/' . $filename . '-497x290.' . $extension))) {
                return Storage::url('public/story/images/' . $filename . '-497x290.' . $extension);
            }

            return $this->theImage;
        } else {
            return 'https://www.sylvansport.com/wp/wp-content/uploads/2018/11/image-placeholder-1200x800.jpg';
        }
    }

    public static function correctImageOrientation($filename) {
        if ( function_exists('exif_read_data') ) {
            $exif = exif_read_data($filename);
            if ( $exif && isset($exif['Orientation']) ) {
                $orientation = $exif['Orientation'];
                if ( $orientation != 1 ) {
                    $img = imagecreatefromjpeg($filename);
                    $deg = 0;
                    switch ($orientation) {
                        case 3:
                            $deg = 180;
                            break;
                        case 6:
                            $deg = 270;
                            break;
                        case 8:
                            $deg = 90;
                            break;
                    }

                    if ( $deg ) {
                        $img = imagerotate($img, $deg, 0);        
                    }
                    // then rewrite the rotated image back to the disk as $filename 
                    imagejpeg($img, $filename, 95);
                } // if there is some rotation necessary
            } // if have the exif orientation info
        } // if function exists      
    }

}
