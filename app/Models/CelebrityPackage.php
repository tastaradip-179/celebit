<?php

namespace App\Models;

use App\Traits\TagTrait;
use Spatie\Tags\HasTags;
use Spatie\EloquentSortable\Sortable;
use Illuminate\Database\Eloquent\Model;
use Spatie\EloquentSortable\SortableTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class CelebrityPackage extends Model implements Sortable
{
    use SoftDeletes, SortableTrait;
    use HasTags, TagTrait;
    
    protected $fillable = [
    	'celebrity_id','package_id','duration','total','extra_per_minute_fee','default','status','order_column','deleted_at'
    ];

    public function celebrity()
    {
        return $this->belongsTo('App\Models\Celebrity');
    }

     public function package()
    {
        return $this->belongsTo('App\Models\Package');
    }
    
}
