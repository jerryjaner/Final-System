<?php

namespace App\Http\Controllers;
use App\Models\order;
use App\Models\OrderDetail;
use App\Models\User;
use App\Models\Payment;
use App\Models\Shipping;
use App\Models\shippingfee;
use Cart;
use Session;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class CheckOutController extends Controller
{
    public function payment()
    {
        $CartDish = Cart::content();


        if(Auth::check())
        {
            // check if the cart is empty or not. If empty the user redirect back
            if(count($CartDish) > 0){

                 $ShipFees =  shippingfee::all();
                 return view('User.CheckOut.CheckOutField',compact('ShipFees') );
            }
            else{

                $notification = array (

                    'message' => 'Your cart is empty please make sure that your cart is not empty',
                    'alert-type' =>'warning'
                );

                return redirect()->back()->with($notification);
            }
           
        }
        else
        {
            return back();
        }
    	
    }

    public function order(Request $request)
    {
    	// return $request;

    	$paymentType = $request->payment_type;


    	if($paymentType == 'Cash_on_Delivery'){


             $ShipFees =  shippingfee::all();

             //check if the database have shipping fee if yes they print with shipping fee
             if(count($ShipFees) != 0){

                foreach ($ShipFees as $sf) {
                 
                    $order = new Order();
                    $order-> user_id = Auth::user()-> id;
                    $order-> order_shippingfee = $sf -> fee;
                    $order-> shipping_id = Session::get('shipping_id');  
                    $order-> order_total = Session::get('sum');
                    $order -> save();

                 }

                    $payment = new payment();
                    $payment ->order_id = $order -> id;
                    $payment ->payment_type = $paymentType;
                    $payment -> save();

                     $CartDish = Cart::content();

                    foreach($CartDish as $cart){

                        $orderDetails = new OrderDetail();
                        $orderDetails ->order_id = $order -> id;
                        $orderDetails ->dish_id = $cart -> id;
                        $orderDetails ->dish_name = $cart -> name;
                        $orderDetails ->dish_price = $cart -> price;
                        $orderDetails ->dish_qty = $cart -> qty;
                        $orderDetails -> save();

                     }

                     Cart::destroy();
                     
                      $notification = array (

                        'message' => 'Your order has been processed, and well let you know when its prepared for delivery or pick-up',
                        'alert-type' =>'success'
                    );


                 return redirect('/')->with($notification);


             }

             //else they print a shipping fee with zero value

             else{

                $order = new Order();
                $order-> user_id = Auth::user()-> id;
                $order-> order_shippingfee = 0;
                $order-> shipping_id = Session::get('shipping_id');  
                $order-> order_total = Session::get('sum');
                $order -> save();

                $payment = new payment();
                $payment ->order_id = $order -> id;
                $payment ->payment_type = $paymentType;
                $payment -> save();
            	
         	    $CartDish = Cart::content();

         	    foreach($CartDish as $cart){

    	    		$orderDetails = new OrderDetail();
    	    		$orderDetails ->order_id = $order -> id;
    	    		$orderDetails ->dish_id = $cart -> id;
    	    		$orderDetails ->dish_name = $cart -> name;
    	    		$orderDetails ->dish_price = $cart -> price;
    	    		$orderDetails ->dish_qty = $cart -> qty;
    	    		$orderDetails -> save();

         	     }
         	     Cart::destroy();
                 
                  $notification = array (

                    'message' => 'Your order has been processed, and well let you know when its prepared for delivery or pick-up',
                    'alert-type' =>'success'
                );

             return redirect('/')->with($notification);
          } 
     	

    	}
    	elseif($paymentType == 'Cash_on_Pickup'){


    		$order = new Order();
    		$order-> user_id = Auth::user()->id;
    		$order-> shipping_id = Session::get('shipping_id');
    		$order-> order_total = Session::get('sum');

    		$order -> save();

    		$payment = new payment();
    		$payment ->order_id = $order -> id;
    		$payment ->payment_type = $paymentType;
    		$payment -> save();


     	    $CartDish = Cart::content();

     	    foreach($CartDish as $cart){

	    		$orderDetails = new OrderDetail();
	    		$orderDetails ->order_id = $order -> id;
	    		$orderDetails ->dish_id = $cart -> id;
	    		$orderDetails ->dish_name = $cart -> name;
	    		$orderDetails ->dish_price = $cart -> price;
	    		$orderDetails ->dish_qty = $cart -> qty;

	    		$orderDetails -> save();


     	     }
     	     Cart::destroy();

             $notification = array (

                'message' => 'Your order has been Successfully processed',
                'alert-type' =>'success'
            );

            
            return redirect('/')->with($notification);

           //  return redirect('checkoutComplete')->with('sms','Your order has been successfully processed.');
     	     // return redirect('checkoutComplete');

    	}
    }
  
    public function complete(){

         if(Auth::check())
         {
           return view('User.CheckOut.OrderComplete');  
         }
         else
         {
            return back();
         }
        	
    }


}
