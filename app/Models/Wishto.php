<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wishto extends Model
{
    protected $fillable = [
    	'book_id', 'fullname', 'pronoun'
    ];

    public function book()
    {
        return $this->belongsTo('App\Models\Book');
    }
}
