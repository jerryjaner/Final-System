<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;
  
  // protected $primaryKey = 'id';
    public function dish()
    {
        return $this -> belongsTo(Dish::class)->withDefault();
    }
    
    public function order()
    {
    	return $this -> belongsTo(order::class)->withDefault();
    }

    
   
   
}
