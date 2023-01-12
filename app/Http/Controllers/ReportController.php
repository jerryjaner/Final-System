<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\order;
use App\Models\OrderDetail;
use App\Models\Dish;
use App\Models\Payment;
use App\Models\Shipping;
use DB;
use PDF;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function client_report()
    {
        $users = user::where('role', 0)->get();
        return view('Admin.Report.ClientReport', compact('users'));   
       
    }

    public function download_client()
    {
    	$users = user::where('role', 0)->get();
    	$pdf = PDF::loadView('Admin.Report.DownloadClientReport',compact('users'));
        return $pdf->stream('DownloadClientReport.pdf');
    }

    public function month()
    {
        
         $orders = DB::table('orders')
         ->join('users','orders.user_id','=', 'users.id')
         ->select('orders.*', 'users.name','users.middlename','users.lastname','users.google_id','users.google_name')
         ->get();
         return view('Admin.Report.Month', compact('orders'));

    } 

    public function filter(Request $request){

        
        $fromdate = $request->input('fromdate');
        $todate = $request->input('todate');

        $orders = DB::table('orders')
        ->join('users','orders.user_id','=', 'users.id')
        ->select('orders.*','orders.created_at','users.name','users.middlename','users.lastname','users.google_name','users.google_id')
        ->whereDate('orders.created_at', '>=', $fromdate)
        ->whereDate('orders.created_at', '<=', $todate)
        ->get();

        // return view('Admin.Report.Month',compact('orders'));
         //$pdf = PDF::loadView('Admin.Report.filter',compact('orders'));
         //return $pdf->stream('filtered.pdf');


    return view('Admin.Report.result',compact('orders'));
     //  return view('Admin.Report.Month', compact('orders'));

    }

    public function download_filtered(){

    
        $orders = DB::table('orders')
        ->join('users','orders.user_id','=', 'users.id')
        ->select('orders.*','orders.created_at','users.name','users.middlename','users.lastname','users.google_name','users.google_id')
        ->get();

        $pdf = PDF::loadView('Admin.Report.filter',compact('orders'));
        return $pdf->stream('filtered.pdf');
    }

    public function monthly_report()
    {

        $current_month = Order::whereYear('created_at',Carbon::now()->year)
            ->whereMonth('created_at',Carbon::now()->month)->count(); 

        $one_month = Order::whereYear('created_at',Carbon::now()->year)
            ->whereMonth('created_at',Carbon::now()->submonth(1))->count();

        $two_month = Order::whereYear('created_at',Carbon::now()->year)
            ->whereMonth('created_at',Carbon::now()->submonth(2))->count(); 

        $three_month = Order::whereYear('created_at',Carbon::now()->year)
             ->whereMonth('created_at',Carbon::now()->submonth(3))->count(); 

        $four_month = Order::whereYear('created_at',Carbon::now()->year)
             ->whereMonth('created_at',Carbon::now()->submonth(4))->count(); 

        $five_month = Order::whereYear('created_at',Carbon::now()->year)
             ->whereMonth('created_at',Carbon::now()->submonth(5))->count(); 

        $six_month = Order::whereYear('created_at',Carbon::now()->year)
             ->whereMonth('created_at',Carbon::now()->submonth(6))->count(); 

        $seven_month = Order::whereYear('created_at',Carbon::now()->year)
             ->whereMonth('created_at',Carbon::now()->submonth(7))->count();

        $eight_months = Order::whereYear('created_at',Carbon::now()->year)
             ->whereMonth('created_at',Carbon::now()->submonth(8))->count(); 

        $nine_months = Order::whereYear('created_at',Carbon::now()->year)
             ->whereMonth('created_at',Carbon::now()->submonth(9))->count(); 
            
        $ten_months = Order::whereYear('created_at',Carbon::now()->year)
             ->whereMonth('created_at',Carbon::now()->submonth(10))->count(); 

        $eleven_months = Order::whereYear('created_at',Carbon::now()->year)
             ->whereMonth('created_at',Carbon::now()->submonth(11))->count(); 


         $month_count = array($current_month, $one_month, $two_month, $three_month, $four_month, $five_month, $six_month, $seven_month, $eight_months, $nine_months, $ten_months, $eleven_months);

      //  dd($month_count);
   
        return view('Admin.Report.Monthly',compact('month_count'));
            
       
        
    }


}
