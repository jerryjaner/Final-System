<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;
use App\Models\User;
use App\Models\Dish;
use App\Models\order;

use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        if(Auth()->user()-> role == 1)
        {

             //   return route('admin_dashboard');
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
              return view('Admin.Home.index', compact('categories','dishes','admin','staff','customers','orders','newuser','pending_orders','cancelled_orders','OnProcess_orders','delivered_orders','out_orders'));
        }
        elseif(Auth()->user()-> role == 0)
        {
                
            $dishes = Dish::where('dish_status', 1) -> get();
            $customer_order = Order::all(); 
                
               //  return route('user_dashboard');
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
    
              return view('User.include.Home',compact('dishes','top_Products','customer_order'));
                 
        }

        elseif(Auth()->user()-> role == 2)
        {
                
              return view('Staff.Home.index');

        }
       
    }
}
