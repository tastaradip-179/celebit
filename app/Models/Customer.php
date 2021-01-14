<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Customer extends Authenticatable
{
    use SoftDeletes;
    
	protected $guard = 'customer';

    protected $fillable = [
    	'fullname','username','email','gender','mobile','dob','password','bio'
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $make_slug = implode('', explode(' ', strtolower($model->fullname)));
            $exists = $model->where('username', $make_slug)->count();
            while ($exists > 0) {
                $make_slug = $make_slug.''.rand(1, 9999);
                $exists = $model->where('username', $make_slug)->count();
            }
            $model->username = $make_slug;
        });
    }

    public function getRouteKeyName()
    {
        return 'username';
    }

    public function books()
    {
        return $this->hasMany('App\Models\Book');
    }

    
}
