<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    public function user()
    {
    	return $this -> belongsTo(User::class)->withDefault();
    }

     public function shippingfee()
    {
        return $this -> belongsTo(shippingfee::class)->withDefault();
    }
   
   
    public function shipping()
    {
    	return $this -> belongsTo(Shipping::class)->withDefault();
    }
   
}