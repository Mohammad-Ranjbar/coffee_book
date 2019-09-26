<?php

namespace App\Http\Controllers;

use App\models\Book;
use App\models\Like;
use Illuminate\Http\Request;

class CommentController extends Controller
{

public function commentBook(Book $book , Request $request)
{
$book->comments()->create([
	'body' => $request->body,
	'user_id' => auth()->user()->id,
]);
return back()->with('success','نظر شما با موفقیت ثبت شد');
}




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
