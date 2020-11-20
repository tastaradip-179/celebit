<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CelebrityPackage extends Model
{
    protected $fillable = [
    	'celebrity_id','package_id','duration','per_minute_fee','extra_per_minute_fee'
    ];

    public function celebrity()
    {
        return $this->belongsTo('App\Models\Celebrity');
    }

     public function package()
    {
        return $this->belongsTo('App\Models\Package');
    }
    
}
