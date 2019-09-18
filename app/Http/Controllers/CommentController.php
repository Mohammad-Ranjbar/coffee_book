<?php

namespace App\Http\Controllers;

use App\models\Like;
use Illuminate\Http\Request;

class CommentController extends Controller
{






	public function voted($id, $vote)
	{
		$like  = Like::find($id);
		$voted = $like->likes()->where('user_id', auth()->user()->id)->first();
		if (isset($voted->id)) {
			$voted->update(['like' => $vote]);
		} else
			$like->likes()->create(['user_id' => auth()->user()->id, 'like' => $vote]);
		return back();
	}


}
