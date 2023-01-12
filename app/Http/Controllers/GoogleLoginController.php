<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request;


class GoogleLoginController extends Controller
{
    public function redirect()
    {
    	return Socialite::driver('google')->redirect();
    }
    public function callback()
    {
    	try {

    		$google_user = Socialite::driver('google')->user();
    		$user = User::where('google_id',$google_user->getId())->first();

    		if(!$user){

    			$new_user = User::create([

    				'google_name' => $google_user->getName(),
    				'email' => $google_user -> getEmail(),
    				'google_id' => $google_user ->getId(),
                    'role' => '0',

    			]);

    			Auth::login($new_user);

    			return redirect()->intended('/home');
    		}
    		else{
    			Auth::login($user);
    			return redirect()->intended('/home');
    		}
    		
    	} catch (\Throwable $th) {
    	
            return redirect('login') -> with('sms', 'Something went Wrong. Please Try Again Later');
    	}
    }
}
