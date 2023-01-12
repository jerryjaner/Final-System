<?php

namespace App\Http\Controllers;
use App\Models\shippingfee;
use Illuminate\Http\Request;

class ShippingFeeController extends Controller
{
    public function shippingfee_index(){

    	$ShippingFee = shippingfee::all();
    	return view('Admin.ShippingFee.fee',compact('ShippingFee'));
    }

    public function add_shipping_fee(Request $request){

    	
    	$shippingfee = new shippingfee();
    	$shippingfee -> fee = $request -> fee;
    	$shippingfee -> save();

        $notification = array (

            'message' => 'Shipping Fee Added Successfully',
            'alert-type' =>'success'
        );

        return back()->with($notification);
    }

    public function edit_shippingfee(Request $request){

        $NewShippingFee = shippingfee::find($request -> id);
        $NewShippingFee -> fee = $request -> fee;
        $NewShippingFee -> save();

        $notification = array (

            'message' => 'ShippingFee Update Successfully',
            'alert-type' =>'info'
        );

        return redirect()->back()->with($notification);
    }

    public function delete_shippingfee($id){

        $ShippingFee = shippingfee::find($id);
        $ShippingFee -> delete();

        $notification = array (

            'message' => 'ShippingFee deleted successfully',
            'alert-type' =>'error'
        );

        return redirect()->back()->with($notification);


    }

    
}
