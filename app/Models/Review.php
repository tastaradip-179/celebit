<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{

	protected $fillable = ['customer_id', 'body', 'reviewable_id', 'reviewable_type']

    public function reviewable()
    {
        return $this->morphTo();
    }
}
