<?php

namespace App\Http\Controllers;

use App\Http\Requests\Threads\ThreadStoreRequest;
use App\models\Channel;

use App\models\Thread;
use App\models\User;
use Illuminate\Http\Request;

class ThreadsController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth')->except(['index', 'show']);
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @param Channel $channel
	 * @return \Illuminate\Http\Response
	 */

	public function index(Channel $channel)
	{

		if ($channel->exists) {
			$threads = $channel->threads();
		} else {
			$threads = Thread::query();
		}

		$by         = request('by');
		$popular    = request('popular');
		$unanswered = request('unanswered');

		if ($popular) {
			$threads = $threads->orderBy('replies_count', 'desc');
		} elseif ($by) {
			$username = $by;
			/** @var User $user */
			$user    = User::where('name', $username)->firstOrFail();
			$threads = Thread::where('user_id', $user->id);
			$threads = $threads->latest();
		} elseif ($unanswered) {
			$threads = $threads->where('replies_count', 0);
		} else {
			$threads = $threads->latest();
		}

		$threads = $threads->get();

		return view('Forum.threads.index', compact('threads'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		$channels = Channel::all();

		return view('Forum.threads.create', compact('channels'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \App\Http\Requests\Threads\ThreadStoreRequest $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(ThreadStoreRequest $request)
	{
		Thread::create([
			'user_id'    => auth()->id(),
			'channel_id' => $request->channel_id, // Change it Temp
			'title'      => $request->title,
			'body'       => $request->body,
		]);

		return redirect(route('threads'))
			->with('flash', 'Your thread has been published');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Models\Thread $thread
	 * @return \Illuminate\Http\Response
	 */
	public function show($channel, Thread $thread)
	{
		$time   = $thread->created_at->diffForHumans();
		$carbon = jdate($time)->ago();

		return view('Forum.threads.show')
			->with([
				'thread'  => $thread,
				'replies' => $thread->replies()->paginate(10),
				'carbon'  => $carbon,
			]);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Models\Thread $thread
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Thread $thread)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @param  \App\Models\Thread $thread
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Thread $thread)
	{
		//
	}

	public function destroy($channel, Thread $thread)
	{
		$this->authorize('update', $thread);
		$thread->replies()->delete();
		$thread->delete();

		return redirect('/threads');
	}
}
