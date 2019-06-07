<?php

namespace App\Http\Controllers;

use App\models\Thread;
use Illuminate\Http\Request;

class ThreadSubscriptionsController extends Controller
{
	public function store($channel_id, Thread $thread)
	{
		$thread->subscribe();
		return back();
    }

	public function destroy($channel_id, Thread $thread)
	{
		$thread->unsubscribe();
		return back();
    }
}
