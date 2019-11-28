<?php

namespace App\Http\Controllers;

use App\Events\MessageSent;
use App\models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('chat');
    }

    public function fetchMessages()
    {

        return Message::with('user')->get();
    }

    public function sendMessages(Request $request)
    {
        $message = auth()->user()->messages()->create([
            'message' => $request->message,
        ]);
        broadcast(new MessageSent($message->load('user')))->toOthers();

        return ['status' => 'success'];
    }
}
