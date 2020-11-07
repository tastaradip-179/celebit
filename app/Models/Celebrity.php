<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Celebrity extends Model
{
	use \Spatie\Tags\HasTags;
	
    protected $fillable = [
    	'name','username','email','designation','gender','mobile','social_link', 'status'
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $make_slug = implode('', explode(' ', strtolower($model->name)));
            $exists = $model->where('username', $make_slug)->count();
            while ($exists > 0) {
                $make_slug = $make_slug.''.rand(1, 9999);
                $exists = $model->where('username', $make_slug)->count();
            }
            $model->username = $make_slug;
        });
    }

    public function images()
    {
        return $this->morphMany('App\Models\Image', 'imageable');
    }

     public function celebritypackages()
    {
        return $this->hasMany('App\Models\CelebrityPackage');
    }

    public function setSocialLinkAttribute( $value ) {
        $this->attributes['social_link'] = json_encode( $value );
    }

    public function getSocialLinkAttribute( $value ) {
        return json_decode( $value );
    }

    public function getRouteKeyName()
    {
        return 'username';
    }
}
