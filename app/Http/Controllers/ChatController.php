<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{


    public function index(){
        $messages = Message::where(function ($query) {
                        $query->where('from_user_id', Auth::user()->id)
                            ->orWhere('to_user_id', Auth::user()->id);
                    })->Where(function ($query) {
                        $query->where('from_user_id', request()->user_to)
                            ->orWhere('to_user_id', request()->user_to);
                    })->get();

        return response()->json([
            'messages' => $messages
        ]);
    }



    public function sendMessage(Request $request)
    {
        // $request->validate([
        //     'to_user_id' => 'required',
        //     'content'    => 'required',
        //     'from_user_id' => 'required',
        // ]);

        $saveMessage = Message::create([
            'from_user_id' => Auth::user()->id,
            'to_user_id'   => $request->input('to_user_id'),
            'message'      => $request->input('message') ?? 'no message',
        ]);


        // $message = [
        //     'from_user_id' => Auth::user()->id,
        //     'to_user_id'   => $saveMessage->to_user_id,
        //     'message'      => $saveMessage->message,
        // ];

        // Logic to broadcast the message will go here

        return response()->json($saveMessage);
    }
}
