<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
	use \Spatie\Tags\HasTags;

	protected $fillable = [
    	'name'
    ];

    public function celebritypackage()
    {
        return $this->hasMany('App\Models\CelebrityPackage');
    }
}
