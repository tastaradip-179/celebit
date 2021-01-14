<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
    	'celebrity_package_id', 'customer_id', 'from', 'subject', 'message', 'upload_time'
    ];

    public function customer()
    {
        return $this->belongsTo('App\Models\Customer');
    }

    public function celebrity_package()
    {
        return $this->belongsTo('App\Models\CelebrityPackage');
    }

    public function wishto()
    {
        return $this->hasOne('App\Models\Wishto');
    }

}
