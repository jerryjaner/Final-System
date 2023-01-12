<?php

namespace App\Http\Controllers;
use App\Models\category;
use App\Models\Dish;
use App\Models\User;
use App\Models\Shipping;
use App\Models\order;
use App\Models\message;
use App\Models\OrderDetail;
use App\Models\Feedback;
use Cart;
use DB;
use Session;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{

   public function index(){
   	 //	$categories = Category::where('category_status', 1) -> get();

     $most_sold = DB::table('dishes')
      ->leftJoin('order_details','dishes.id', '=', 'order_details.dish_id')
      ->selectRaw('dishes.id, SUM(order_details.dish_qty) as total')
      ->groupBy('dishes.id')
      ->orderBy('total','desc')
      ->take(3)
      ->where('dish_qty', '!=', 0)
      ->get();

      $top_Products = [];
    
      foreach ($most_sold as $s) {
       
        $product = Dish::findOrFail($s->id);
        $product -> dish_qty = $s -> total;
        $top_Products[] = $product;
        
       }
    
      $customer_order = Order::all(); 
   		// $dishes = Dish::where('dish_status', 1) -> get(); 
      $dishes = DB::table('dishes')
                  ->join('categories','dishes.category_id', '=', 'categories.category_id')
                  ->where('category_status', 1)
                  ->where('dish_status', 1)
                  ->get();

   		return view('User.include.Home',compact('dishes','top_Products','customer_order') );
   }

   public function dish_show($id){
   // $categories = Category::where('category_status', 1) -> get();
      $categoryDish = Dish::where('category_id', $id)
                          ->where('dish_status', 1) 
                          ->get();

      return view('User.include.Dish',compact('categoryDish') );
   }
   
   public function Contact_us(){

    return view('User.include.Contact_Us');

   }

   // For the Shipping //
   public function shipping(){
      if(Auth::check())
      {
        $CartDish = Cart::content();
        $user_id = Auth::user()->id;
        $customer = User::find($user_id);

        if(count($CartDish) > 0){

          return view('User.CheckOut.Shipping',compact('customer'));
        }
        else{

         $notification = array (

            'message' => 'Your cart is Empty',
            'alert-type' =>'error'
        );
      
     
         return redirect()-> back()->with($notification);
        }
        
      }
      else{

        return back();
      }
     
   }
     // for shipping information
    public function shipping_save(Request $request){
      
      if(Auth::check())
      {
        if(Auth::user()->google_id == null){

          $shipping = new Shipping();
          $shipping->name = $request -> name;
          $shipping->email = $request -> email;
          $shipping->phone_no = $request -> phone_no;
          $shipping -> purok = $request -> purok;
          $shipping->address = $request -> address;

        // return $shipping;
        $shipping -> save();

        Session::put('shipping_id', $shipping -> id);
        return redirect() -> route('Checkout_payment');
        }
        else {
          $shipping = new Shipping();
          $shipping->name = $request -> google_name;
          $shipping->email = $request -> email;
          $shipping->phone_no = $request -> phone_no;
          $shipping -> purok = $request -> purok;
          $shipping->address = $request -> address;

        //return $shipping;
        $shipping -> save();

        Session::put('shipping_id', $shipping -> id);
        return redirect() -> route('Checkout_payment');
        }
         
      }
      else{

        return back();
      }
        
   
    }

    public function Notification_Msg(){

      $notification_msg = Message::where('customer_email', Auth::user()->email)->get();
      return view('User.Notification.Notification_Message',compact('notification_msg'));
    }

    public function Mark_as_read($id){

      $unread_msg = Message::find($id);
      $unread_msg->message_status = 'Read';
      $unread_msg->save();

       $notification = array (

            'message' => 'Message Read',
            'alert-type' =>'success'
        );

        return back()->with($notification);
    }

    public function customerOrder(){

      if(Auth::check())
      {
        $orders = DB::table('orders')
          ->join('users','orders.user_id','=', 'users.id')
          ->join('payments','orders.id','=', 'payments.order_id')
          ->select('orders.*', 'users.name','users.middlename','users.lastname','users.google_name','users.google_id','payments.payment_type','payments.payment_status')
          ->get();
  
        return view('User.Order.ViewOrder',compact('orders'));
      }
      else{
        
        return back();
      }
    }
      
    public function ViewOrder($id){

      if(Auth::check())
      {
      
        $order = Order::find($id);
        $user_id = Auth::user()->id;
        $customer = User::find($order -> user_id);
        $OrderD = OrderDetail::where('order_id', $order-> id)->get();

        // pag ang user pumunta sa order details tapos hindi nya order id yung pinuntahan nya automatic
        // mag rereturn back sya

          if($customer -> id == $user_id &&  $order -> order_status != 'Cancelled'){
          
             return view('User.Order.OrderDetails',compact('order','customer','OrderD'));
          }
          else
          {
             return back();
          }

       }
       else{

        
         return back();
       }
        
    }
  
    public function cancel_order(Request $request){
        $order= Order::find( $request -> id);
        $order -> order_status = 'Cancelled'; 
        $order->save();

        $notification = array (

            'message' => 'Order Cancelled ',
            'alert-type' =>'error'
        );

        return back()->with($notification);
      
    }

    public function customerprofile(){
      // $customers = User::where('role',0)
      //                  ->where('id', Auth::user()->id)
      //                  ->get();

      $CustomerProfile = User::find(Auth::id());

      if(Auth::check()){


        return view('User.CustomerProfile.Profile', compact('CustomerProfile'));

      }
      else{
        return back();
      }
      
      
    }

    public function customer_profile_update(Request $request){

      $validated = $request->validate([
        'email' => 'required|email|string|unique:users,email,'.$request -> id,
        'phone_number' => 'required|string|min:11|max:11',

      ]);

      //  $validated = $request->validate([
      //   'phone_number' => 'required|string|min:11|max:11',
      // ]);


      $customer_profile = User::find($request->id);
      $customer_profile->name = $request->name;
      // $customer_profile->middlename = $request->middlename;
      $customer_profile->lastname = $request->lastname;
      $customer_profile-> google_name =$request -> google_name;
      $customer_profile -> purok = $request -> purok;
      $customer_profile -> address = $request -> address;
      $customer_profile -> phone_number = $request -> phone_number;
      $customer_profile -> email = $request -> email;

      if($request -> hasfile('avatar'))
      {
        $destination = 'BackEndSourceFile/Profile_Picture/'.$customer_profile ->avatar;

        if(File::exists($destination))
        {
          File::delete($destination);
        }
        $file = $request ->file('avatar');
        $extention = $file->getClientOriginalExtension();
        $filename = time ().'.'.$extention;
        $file->move('BackEndSourceFile/Profile_Picture/',$filename);

        $customer_profile->avatar =$filename;
      }

      $customer_profile->save();

        $notification = array (

            'message' => 'Your Profile Updated Successfully',
            'alert-type' =>'info'
        );

       
        return back()->with($notification);

    }

    public function view_of_change_pass(){


       return view('User.CustomerProfile.ChangePassword');
    }

    public function customer_update_password(Request $request){


       $validated = $request->validate([
       
        'oldpassword' => 'required|password',
        'password' => 'required|confirmed|min:8|max:255',
        'password_confirmation' => 'required',


      ]);

      $hashedPassword = Auth::user()->password;

      if(Hash::check($request -> oldpassword,$hashedPassword)){

          $customer = User::find(Auth::id());
          $customer -> password = Hash::make($request-> password);
          $customer->save();
          Auth::logout();
         
          return redirect()->route('login')->with('sms','Password Successfully Change. You need to login with new password');
      }
      else{      

          return redirect()->back();
      }

    }

    public function customer_feedback(Request $request){

      $customer_feedback = new Feedback();
      $customer_feedback -> name = $request -> name;
      $customer_feedback -> email = $request -> email;
      $customer_feedback -> contact = $request -> contact;
      $customer_feedback -> message = $request -> message;
      $customer_feedback -> save();


      $notification = array (

            'message' => 'Feedback Successfully Sent',
            'alert-type' =>'success'
        );

        return back()->with($notification);


    }

      


}

