<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
    	'invoice_id', 'book_id', 'status', 'transaction_info'
    ];
}
