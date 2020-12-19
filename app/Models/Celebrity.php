<?php

namespace App\Models;

use App\Traits\TagTrait;
use Spatie\Tags\HasTags;
use Spatie\EloquentSortable\Sortable;
use Illuminate\Database\Eloquent\Model;
use Spatie\EloquentSortable\SortableTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class Celebrity extends Model implements Sortable
{
    use SoftDeletes, SortableTrait;
	use HasTags, TagTrait;
	
    protected $fillable = [
    	'name','username','email','designation','gender','mobile','social_link', 'status', 'about'
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
        return $this->hasMany('App\Models\CelebrityPackage')->orderBy('default', 'desc');
    }

    public function setSocialLinkAttribute( $value ) {
        $this->attributes['social_link'] = json_encode( $value );
    }

    public function getSocialLinkAttribute( $value ) {
        return json_decode( $value );
    }

    public function profileImage()
    {
        $image = $this->images()->where('type', 1)->first();
        if (!empty($image)) {
            return $image->url;
        }
        return '';
    }

    public function getRouteKeyName()
    {
        return 'username';
    }
}
