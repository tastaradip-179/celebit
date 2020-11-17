<?php

namespace App\Models;


use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Customer extends Authenticatable
{
	protected $guard = 'customer';

    protected $fillable = [
    	'fullname','username','email','designation','gender','mobile','dob','address','password'
    ];

    
}
