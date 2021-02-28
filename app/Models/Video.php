<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable = [
    	'description','video_url','status','videoable_id','videoable_type'
    ];

    public function imageable()
    {
       return $this->morphTo();
    }

}
