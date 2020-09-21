<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CelebrityPackage extends Model
{
    protected $fillable = [
    	'celebrity_id','video_type','per_minute_fee','extra_per_minute_fee'
    ];

    
}
