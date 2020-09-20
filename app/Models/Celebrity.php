<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Celebrity extends Model
{
    protected $fillable = [
    	'name','email','designation','gender','mobile','social_link', 'status'
    ];

    
}
