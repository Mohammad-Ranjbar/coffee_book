<?php

namespace App\Http\Controllers;

use App\models\Reply;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }

    public function store(Reply $reply)
    {
    	$reply->favorites()->create([
    		'user_id'       => auth()->id(),
		    'favorite_id'   => $reply->id,
		    'favorite_type' => get_class($reply),
	    ]);
    	return back();
    }

    public function destroy(Reply $reply)
    {
        $reply->unFavorite();
    }

}
