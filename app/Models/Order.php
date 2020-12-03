<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
    	'celebrity_package_id', 'customer_id', 'subject', 'message', 'upload_time'
    ];
}
