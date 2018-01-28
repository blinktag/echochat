<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;
use App\Events\MessagePosted;

class MessageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return Message::with('user')->get();
    }

    public function store(Request $request)
    {
        $user = auth()->user();
        $message = $user->messages()->create([
            'message' => request('message')
        ]);

        broadcast(new MessagePosted($message, $user))->toOthers();

        return response(['success' => true], 201);
    }
}
