<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    use HasFactory;
    
    protected $fillable =
    [   
        'category_id',
        'dish_name',
		'dish_detail',
		'dish_image',
		'dish_status',
        'full',
        'full_price',
       
			

    ];

   // protected $primaryKey = 'dish_id';
}
