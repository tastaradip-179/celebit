<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Package extends Model
{

	use \Spatie\Tags\HasTags;
    use SoftDeletes;
	
	protected $fillable = [
    	'name','status','deleted_at'
    ];

    public function celebritypackage()
    {
        return $this->hasMany('App\Models\CelebrityPackage');
    }
}
