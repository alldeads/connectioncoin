<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Traits\HasRoles;
use App\Message;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'bio', 'email', 
        'password', 'photo', 'coverphoto', 'nickname',
        'connection_made', 'coin_given'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $appends = ['thePhoto'];

    public function socialmedialinks()
    {
        return $this->hasOne(UserSocialMediaLink::class);
    }

    public function stories()
    {
        return $this->hasMany('App\Story');
    }

    public function likes()
    {
        return $this->hasMany('App\StoryLike');
    }

    public function likedTheStory($story_id, $reaction_id)
    {
        $like = StoryLike::where('user_id', $this->id)->where(['story_id' => $story_id, 'reaction_id' => $reaction_id])->first();

        return $like;
    }

    public function messages()
    {
        return $this->hasMany('App\Message', 'id', 'from_user_id')->groupBy('to_user_id');
    }

    public function getLastMessage()
    {
        return Message::where('from_user_id', $this->id)->where('to_user_id', auth()->id())->latest()->first();
    }

    public function getMilestone( $connection_made )
    {
        if ( $connection_made >= 1000 ) {

            return "d1b85ad";
        }

        else if ( $connection_made >= 500 ) {

            return "da55ca1";
        }

        else if ( $connection_made >= 100 ) {

            return "d339C5E";
        }

        else if ( $connection_made >= 25 ) {

            return "dffe916";

        } else {

            return "";
        }
    }

    public function getSocialMediaUrl( $url )
    {
        $parsed = parse_url( $url );

        if ( empty($parsed['scheme']) ) {
            $url = 'http://' . ltrim($url, '/');
        }

        return $url;
    }

    public function getThePhotoAttribute()
    {
        $filename1 = public_path('/uploads/user/profilephoto') . '/' . $this->photo;
        $filename2 = Storage::url($this->photo);

        if ( file_exists( $filename1 ) && strlen( $this->photo ) > 0 ) {
            return asset('/uploads/user/profilephoto/') . '/' . $this->photo;
        }

        if ( file_exists( $filename2 ) ) {
            return Storage::url($this->photo);
        }

        return asset('images/connectionc.png');
    }

    public function getTheCoverPhotoAttribute()
    {
        $filename1 = public_path('/uploads/user/coverphoto') . '/' . $this->coverphoto;
        $filename2 = Storage::url($this->coverphoto);

        if ( file_exists( $filename1 ) && strlen( $this->coverphoto ) > 0 ) {
            return asset('/uploads/user/coverphoto/') . '/' . $this->coverphoto;
        }

        if ( file_exists( $filename2 ) ) {
            return Storage::url($this->coverphoto);
        }

        return asset('images/connectionc.png');
    }

    public function getFullName()
    {
        if (null == $this->first_name && null == $this->last_name) {
            return $this->nickname;
        } else {
            return $this->first_name . ' ' . $this->last_name;
        }
    }

}
