<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wishto extends Model
{
    protected $fillable = [
    	'request_id', 'fullname', 'pronoun'
    ];
}
