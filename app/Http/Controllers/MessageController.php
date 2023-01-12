<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function message_customer(){

        $all_msg = Message::all();
        $users = User::where('role',0)->get();
    	return view('Admin.Message.Messages',compact('all_msg','users'));
    }

    public function new_message(Request $request){

    	
        $user = Auth::user();

        if($request -> customer_email == $user->email){

            $notification = array (

                'message' => 'Cant message your self ',
                'alert-type' =>'error'
            );

            return back()->with($notification);
        }
        

        $msg = Message::create([ 

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

