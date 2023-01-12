<?php

namespace App\Http\Controllers;
use App\Models\Feedback;
use DB;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function feedback(){

    	$customers_feedback = Feedback::all();
    	return view('Admin.Customer_Feedback.feedback',compact('customers_feedback'));
    }

    // public function feedback_delete($id){

    // 	$feedback_delete = Feedback::find($id);
    // 	$feedback_delete -> delete();

    // 	  $notification = array (

    //         'message' => 'Feedback Deleted Successfully',
    //         'alert-type' =>'error'
        
    //     );

    //     return back()->with($notification);
    // }
    public function feedback_filter(Request $request){

        $fromdate = $request->input('date_from');
        $todate = $request->input('date_to');

        $customers_feedback = DB::table('feedback')
                    ->whereDate('feedback.created_at', '>=', $fromdate)
                    ->whereDate('feedback.created_at', '<=', $todate)
                    ->get();

        return view('Admin.Customer_Feedback.feedback',compact('customers_feedback'));
    }
}
