<?php
namespace App\Http\Controllers;
use App\models\Reply;
use App\models\Thread;
use Illuminate\Http\Request;
class ReplyController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

	public function index()
	{
		//
	}

	public function create()
	{
		//
	}

	public function store(Request $request, $channel, Thread $thread)
	{
		$thread->addReply([
			'user_id' => auth()->id(),
			'body'    => $request->body,
		]);
		return back();
	}

	public function show(Reply $reply)
	{
		//
	}

	public function edit(Reply $reply)
	{
		//
	}

	public function update(Request $request, Reply $reply)
	{
		$this->authorize('update', $reply);
		$reply->update(request(['body']));
	}

	public function destroy(Reply $reply)
	{
		$this->authorize('update', $reply);
		$reply->thread->decrement('replies_count');
		if($reply->favorites){
			$reply->favorites()->delete();
		}
		$reply->delete();
		if(request()->expectsJson()) {
			return response(['status' => 'Reply deleted']);
		}
		return back();
	}
}
