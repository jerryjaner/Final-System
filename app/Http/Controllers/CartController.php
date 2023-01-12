<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dish;
use App\Models\shippingfee;
use Cart;



class CartController extends Controller
{
    public function insert(Request $request)
    {
    	$dish = Dish::where('id', $request -> id) -> first();
 
    	Cart::add([

    		'id'    => $request -> id,
    		'qty'   => $request -> qty,
    		'name'  => $dish -> dish_name,
    		'price' => $dish -> full_price,
    		'weight'=> 550,
    		 'options' =>
    		 [
    		 	'image' => 'BackEndSourceFile/dish_image/'.$dish ->dish_image,
    		 ],
    		
    	]);

        $notification = array (

            'message' => 'Item Added to Cart',
            'alert-type' =>'success'
        );
    	
    	
         return back()->with($notification);
    }

    public function show()
    {   
        $CartDish = Cart::content();
        $ShipFees =  shippingfee::all();
     	return view('User.Cart.Show', compact('CartDish','ShipFees'));
    }

    public function remove($rowId)
    {
        Cart::remove($rowId);

         $notification = array (

            'message' => 'Item deleted Succesfully',
            'alert-type' =>'error'
        );

        return back()->with($notification);
    }

     public function update(Request $request)
    {
            Cart::update($request->rowId, $request->qty);

            $notification = array (

            'message' => 'Updated Successfully',
            'alert-type' =>'success'
        );
            return back()->with($notification);
    }

    public function cartCount()
    {
        // to count the cart content
        $cartCount = Cart::content()->count();
        return response() -> json(['count' => $cartCount]);
    }

}
