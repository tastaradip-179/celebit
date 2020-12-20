<?php

namespace App\Models;

use App\Traits\TagTrait;
use Spatie\Tags\HasTags;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Package extends Model
{

    use SoftDeletes;
    use TagTrait, HasTags;
	
	protected $fillable = [
    	'name','status','deleted_at'
    ];

    public function celebritypackage()
    {
        return $this->hasMany('App\Models\CelebrityPackage');
    }
}
