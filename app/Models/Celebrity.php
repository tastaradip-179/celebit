<?php

namespace App\Models;

use App\Traits\TagTrait;
use Spatie\Tags\HasTags;
use Spatie\EloquentSortable\Sortable;
use Illuminate\Database\Eloquent\Model;
use Spatie\EloquentSortable\SortableTrait;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Celebrity extends Authenticatable implements Sortable
{
    use SoftDeletes, SortableTrait;
	use HasTags, TagTrait;

    protected $guard = 'celebrity';
    protected $fillable = [
    	'name','username','email','password','category','designation','gender','mobile','social_link', 'status', 'about'
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

    public function videos()
    {
        return $this->morphMany('App\Models\Video', 'videoable');
    }

    public function categories()
    {
        return $this->hasMany('App\Models\Category');
    }

    public function celebrity_packages()
    {
        return $this->hasMany('App\Models\CelebrityPackage')->ordered();
    }

    public function reviews()
    {
        return $this->morphMany(Review::class, 'reviewable');
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

    public function profileVideo()
    {
        $video = $this->videos()->where('status', 2)->latest()->first();
        if (!empty($video)) {
            return $video->video_url;
        }
        return '';
    }

    public function packageWithPaginate($paginate=15)
    {
        return $this->celebrity_packages()->paginate($paginate);
    }

    public function minPackagePrice(){
        return $this->celebrity_packages()->pluck('total')->min();
    }
    public function maxPackagePrice(){
        return $this->celebrity_packages()->pluck('total')->max();
    }

    public function getRouteKeyName()
    {
        return 'username';
    }
}
