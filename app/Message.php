<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Message extends Model
{

    use SoftDeletes;

    protected $fillable = [
        'from', 'to', 'text', 'read'
    ];

    public function getTheFormattedTimeAgoAttribute()
    {
        return $this->created_at->diffForHumans();
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'from_user_id');
    }

    public function recipient()
    {
        return $this->belongsTo('App\User', 'to_user_id');
    }

    public function getTheLastMessage( $from, $to, $is_reverse=false )
    {
        if ( $is_reverse ) {
            $x = $from;

            $from = $to;
            $to = $x;
        }

        $message = Message::where(['from_user_id' => $from, 'to_user_id' => $to])
                        ->orderBy('created_at', 'desc')
                        ->limit(1)
                        ->get();

        if ( count( $message->toArray() ) > 0 ) {

            return $message[0]->text;
        }

        return "";
    }

}
