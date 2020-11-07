<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{

	protected $fillable = [
    	'name'
    ];

    public function celebritypackage()
    {
        return $this->belongsTo('App\Models\CelebrityPackage');
    }
}
