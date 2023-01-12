<?php

namespace App\Http\Controllers;
use App\Models\order;
use App\Models\OrderDetail;
use App\Models\User;
use App\Models\Dish;
use App\Models\Payment;
use App\Models\Shipping;
use App\Models\shippingfee;
use DB;
// use PDF;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class OrderController extends Controller
{
    
    public function Manage_Order()
    {
       
    	$orders = DB::table('orders')
    		->join('users','orders.user_id','=', 'users.id')
    		->join('payments','orders.id','=', 'payments.order_id')      
    		->select('orders.*', 'users.name','users.middlename','users.lastname','users.google_id','users.google_name','payments.payment_type','payments.payment_status')
    		->get();
            
    	return view('Admin.Order.ManageOrder',compact('orders'));
    }

    public function View_Order($id) 
    {
        $order = Order::find($id);
        $user_id = Auth::user()->id;
        $customer = User::find($order -> user_id);
        $shipping = Shipping::find($order -> shipping_id);
        $payment = payment::where('id',$order-> id)->first();
        $OrderD = OrderDetail::where('order_id', $order-> id)->get();

        return view('Admin.Order.ViewOrder',compact('order','customer','shipping','payment','OrderD'));
    } 

    public function view_invoice($id)
    {

        $order = Order::find($id);
        $user_id = Auth::user()->id;
        $customer = User::find($order -> user_id);
        $shipping = Shipping::find($order -> shipping_id);
        $payment = payment::where('id',$order-> id)->first();
        $OrderD = OrderDetail::where('order_id', $order-> id)->get();
        $Shipping_Fee = shippingfee::all();
            
        $orders = DB::table('orders')
            ->join('users','orders.user_id','=', 'users.id')
            ->join('payments','orders.id','=', 'payments.order_id')
            ->select('orders.*', 'users.name','users.middlename','users.lastname','payments.payment_type','payments.payment_status')
            ->get();

        return view('Admin.Order.OrderInvoice',compact('order','customer','shipping','payment','OrderD','orders','Shipping_Fee'));
    }

    public function delete_order($id)
    {

        $order = order::find($id);
        $order -> delete();

        $notification = array (

            'message' => 'Order Deleted Successfully',
            'alert-type' =>'error'
        );

        return back()->with($notification);
        
    }
    public function download_invoice($id)
    {

        $order = Order::find($id);
        $user_id = Auth::user()->id;
        $customer = User::find($order -> user_id);
        $shipping = Shipping::find($order -> shipping_id);
        $payment = payment::where('id',$order-> id)->first();
        $OrderD = OrderDetail::where('order_id', $order-> id)->get();
        $Shipping_Fee = shippingfee::all();


        $orders = DB::table('orders')
            ->join('users','orders.user_id','=', 'users.id')
            ->join('payments','orders.id','=', 'payments.order_id')
            ->select('orders.*', 'users.name','payments.payment_type','payments.payment_status')
            ->get();
            
        
        $pdf = PDF::loadView('Admin.Order.DownloadInvoice',compact('order','customer','shipping','payment','OrderD','orders','Shipping_Fee'));
        return $pdf ->setPaper('short', 'portrait')
                    ->stream('OrderInvoice.pdf');
    }

    //for the update status of payment

      public function update(Request $request)
     {

        $order = Payment::find( $request -> id);
        $order -> payment_status = $request -> payment_status;
        $order->save();
        
         $notification = array (

            'message' => 'Payment Status Update Successfully',
            'alert-type' =>'info'
        );

        return back()->with($notification);
        // return back()->with('payment_status_msg','Payment Status Updated Successfully');
 
    }

    //for the update status of Order

     public function order_status(Request $request)
     {
        $order= Order::find( $request -> id);
        $order -> order_status = $request -> order_status; 
        $order->save();

        $notification = array (

            'message' => 'Order Status Update Successfully',
            'alert-type' =>'info'
        );

        return back()->with($notification);
        // return back()->with('order_status_msg','Order Status Updated Successfully');
 
    }


}
