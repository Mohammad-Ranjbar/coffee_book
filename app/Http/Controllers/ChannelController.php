<?php

namespace App\Http\Controllers;

use App\models\Channel;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ChannelController extends Controller
{
    public function index(Channel $channel)
    {
        if($channel->exists){
        	$threads = $channel->threads()->get();
        } else {
        	$threads = Thread::latest()->get();
        }
        return view('threads.index',compact('threads'));
    }
}
