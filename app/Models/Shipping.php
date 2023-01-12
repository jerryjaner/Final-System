<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    use HasFactory;
    protected $fillable =
    [
        
    	'name',
    	'email',
    	'purok',
    	'phone_no',
    	'address',
    ];

		
}
