<?php

namespace App\Http\Controllers;

use App\models\Book;
use App\models\Comment;
use App\models\Like;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function commentBook(Book $book, Request $request)
    {
        $book->comments()->create([
            'body'    => $request->body,
            'user_id' => auth()->user()->id,
        ]);

        return back()->with('success', 'نظر شما با موفقیت ثبت شد');
    }

    public function deleteComment($id)
    {
        $del = Comment::find($id)->first();
        $del->delete();

        return back();
    }

    public function likeComment($id)
    {
      $like = Comment::find($id)->likes()->create([
          'like' => 1,
          'user_id' =>auth()->user()->id,
      ]);

        return back();
    }
    public function unlikeComment($id)
    {
        Comment::find($id)->likes()->where('user_id', auth()->user()->id)->delete();
        return back();
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
