<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class message extends Model
{
    use HasFactory;

    protected $fillable = [
     	'message','customer_email','sender','user_id'
     ]; 

	public function user()
    {
    	return $this -> belongsTo(User::class)->withDefault();
    }
    public function message(){

    	return $this->belongsTo(User::class, 'customer_email', 'email');
    }

    
}
