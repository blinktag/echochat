<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;

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
        $user->messages()->create([
            'message' => request('message')
        ]);

        return response(['success' => true], 201);
    }
}
