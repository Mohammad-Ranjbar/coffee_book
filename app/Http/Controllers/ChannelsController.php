<?php

namespace App\Http\Controllers;

use App\models\Thread;
use Illuminate\Http\Request;
use App\Models\Channel;

class ChannelsController extends Controller
{
	public function index(Channel $channel)
	{
		if($channel->exists) {
			$threads = $channel->threads()->latest()->get();
		} else {
			$threads = Thread::latest()->get();
		}
		return view('Forum.threads.index')->with(['threads' => $threads]);
    }
}
