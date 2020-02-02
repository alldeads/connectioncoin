<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coin extends Model
{

    protected $fillable = [
        'phrase',
        'number'
    ];

    public function exists($number, $phrase)
    {
        return $this->where('number', $number)->where('phrase', $phrase)->first();
    }

    public function stories()
    {
        return $this->hasMany('App\Story', 'coin_id', 'id');
    }

    public function lastPostedStory()
    {
        return $this->stories()->withTrashed()->latest()->first();
    }

    public static function circulation()
    {
        $circulation = Story::withTrashed()->select('coin_id')->groupBy('coin_id')->get();

        return count( $circulation->toArray() );
    }

}
