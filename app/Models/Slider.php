<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $fillable = ['title', 'type', 'caption'];

    public function images()
    {
        return $this->morphMany('App\Models\Image', 'imageable');
    }

    public function getImage()
    {
        $image = $this->images()->first();
        if (!empty($image)) {
            return $image->url;
        }
        return '';
    }
}
