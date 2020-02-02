<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class StoryImage extends Model
{

    protected $fillable = [
        'story_id',
        'filepath'
    ];

    public function story()
    {
        return $this->belongsTo('App\Story');
    }

    public function getCompressImage( $path )
    {
    	// Get extension
    	$ext = pathinfo( $path, PATHINFO_EXTENSION );

    	// Get compressed file
    	$old_filename = rtrim($path, "." . $ext);
    	$new_filename = $old_filename . "-497x290." . $ext;

    	// Get File
    	return Storage::url($path);
    }

}
