<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wishto extends Model
{
    protected $fillable = [
    	'order_id', 'fullname', 'pronoun'
    ];
}
