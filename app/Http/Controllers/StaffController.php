<?php

namespace App\Http\Controllers;
use App\Models\order;
use App\Models\OrderDetail;
use App\Models\User;
use App\Models\category;
use App\Models\Dish;
use App\Models\Payment;
use App\Models\Shipping;
use App\Models\shippingfee;
use App\Models\Message;
use DB;
use PDF;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    function index()
    {
          $categories = Category::count();
          $dishes = Dish::count();
          $orders = Order::count();
          $pending_orders = Order::where('order_status','pending')->count();
          $cancelled_orders = Order::where('order_status','Cancelled')->count();
          $OnProcess_orders = Order::where('order_status','On Process')->count();
          $delivered_orders = Order::where('order_status','Delivered')->count();
          $out_orders = Order::where('order_status','Out of Delivery')->count();
          $admin = User::where('role','1')->count();
          $staff = User::where('role','2')->count();
          $customers = User::where('role','0')->count();
          $newuser = User::where('created_at', '>', today())->count();

          return view('Staff.Home.index', compact('categories','dishes','admin','staff','customers','orders','newuser','pending_orders','cancelled_orders','OnProcess_orders','delivered_orders','out_orders'));  
    }

    public function CustomerOrder()
    {
    	$orders = DB::table('orders')
    		->join('users','orders.user_id','=', 'users.id')
    		->join('payments','orders.id','=', 'payments.order_id')
    		->select('orders.*', 'users.name', 'users.middlename','users.lastname','users.google_id','users.google_name','payments.payment_type','payments.payment_status')
    		->get();

    	return view('Staff.CustomerOrder.Order',data: compact('orders'));
    }
    

    public function CustomerInvoice($id)
    {

        $order = Order::find($id);
        $user_id = Auth::user()->id;
        $customer = User::find($order -> user_id);
        $shipping = Shipping::find($order -> shipping_id);
        $payment = payment::where('id',$order-> id)->first();
        $OrderD = OrderDetail::where('order_id', $order-> id)->get();
        $Shipping_Fees = shippingfee::all();

        $orders = DB::table('orders')
            ->join('users','orders.user_id','=', 'users.id')
            ->join('payments','orders.id','=', 'payments.order_id')
            ->select('orders.*', 'users.name','users.middlename','users.lastname','users.google_name','users.google_id','payments.payment_type','payments.payment_status')
            ->get();

        return view('Staff.CustomerOrder.CustomerInvoice',data: compact('order','customer','shipping','payment','OrderD','orders','Shipping_Fees'));
    }

    public function DownloadCustomerInvoice($id)
    {
        $order = Order::find($id);
        $user_id = Auth::user()->id;
        $customer = User::find($order -> user_id);
        $shipping = Shipping::find($order -> shipping_id);
        $payment = payment::where('id',$order-> id)->first();
        $OrderD = OrderDetail::where('order_id', $order-> id)->get();
        $Shipping_Fees = shippingfee::all();

        $orders = DB::table('orders')
                    ->join('users','orders.user_id','=', 'users.id')
                    ->join('payments','orders.id','=', 'payments.order_id')
                    ->select('orders.*', 'users.name','users.middlename','users.lastname','payments.payment_type','payments.payment_status')
                    ->get();

        $pdf = PDF::loadView('Staff.CustomerOrder.Receipt',compact('order','customer','shipping','payment','OrderD','orders','Shipping_Fees'));
        return $pdf->stream('OrderInvoice.pdf');
     
    }

    public function UpdatePayment(Request $request)
    {
        $order = Payment::find( $request -> id);
        $order -> payment_status = $request -> payment_status;
        $order->save();

        $notification = array (

            'message' => 'Payment Status Updated Successfully',
            'alert-type' =>'success'
        );

        return back()->with($notification);
        //return back()->with('sms','Payment Status Updated Successfully');
 
    }

    public function UpdateOrder(Request $request)
    {
        $order= Order::find( $request -> id);
        $order -> order_status = $request -> order_status; 
        $order->save();

        $notification = array (

            'message' => 'Order Status Updated Successfully',
            'alert-type' =>'success'
        );

        return back()->with($notification);

        // return back()->with('sms','Order Status Updated Successfully');
    }

    public function message_index(){

        $all_msg_send = Message::all();
        $customers = User::where('role',0)->get();
        return view('Staff.Message.staff_msg',compact('all_msg_send','customers'));
    }

    public function message_customer(Request $request){


        if($request -> customer_email == Auth::user() -> email){

            $notification = array (

                'message' => 'Cant message your self ',
                'alert-type' =>'error'
            );

            return back()->with($notification);
        }
  

        $msg_customers = Message::create([             
          'message' => $request->input('message'),
          'sender' => $request-> sender,
          'customer_email' => $request-> customer_email,
          ]);    

        // return($msg);

        $notification = array (

                'message' => 'Message Sent',
                'alert-type' =>'success'
            );

            return back()->with($notification);
    }
}
