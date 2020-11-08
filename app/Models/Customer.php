<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
    	'fullname','username','email','designation','gender','mobile','dob','address'
    ];
}
