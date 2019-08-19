<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;
use Image;

class UserController extends Controller
{
    public function profile()
    {
    	$user = auth()->user();
		$a =  $user->created_at->diffForHumans();

	  $carbon =jdate($a)->ago();
	   return view('profile',compact('user','carbon'));
    }

    public function update_avatar(Request $request)
    {
	    $user = Auth::user();

	    if ($request->hasFile('avatar')) {
		    $avatar = $request->file('avatar');
		    $filename = time() . '.' . $avatar->getClientOriginalExtension();
		    Image::make($avatar)->resize(300,300)->save(public_path('/uploads/avatars/'.$filename));
		    $user->avatar = $filename;

	    }
	    $user->name   = $request->name;
	    $user->save();
	    return back();


    }
}
