<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable = [
    	'book_id','description','video_url','status','videoable_id','videoable_type'
    ];

    public function videoable()
    {
       return $this->morphTo();
    }

    public function book()
    {
        return $this->belongsTo('App\Models\Book');
    }

}
