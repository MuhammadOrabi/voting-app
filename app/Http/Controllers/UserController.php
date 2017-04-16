<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
 	public function active(Request $request)
    {
    	$user = User::find($request->id);
        if($user->activate->code == $request->code)
        {
            $user->active = 1;
            $user->save();
        }
        return redirect()->home();
    }
    public function resend(Request $request)
    {
    	$user = User::find($request->id);
    	$user->activate()->save(['code' => str_random(40)]);
        \Mail::to($user)->send(new activateMail($user));
        return back();
    }   
}
