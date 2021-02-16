<?php

namespace App\Models;

use App\Traits\TagTrait;
use Spatie\Tags\HasTags;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	use HasTags, TagTrait;

    protected $fillable = ['name'];

    public function celebrity()
    {
        return $this->belongsTo(\App\Models\Package::class, 'celebrity_id');
    }
}
