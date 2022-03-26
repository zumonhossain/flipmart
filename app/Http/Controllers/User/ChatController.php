<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\User;
use Auth;

class ChatController extends Controller{
    public function sendMsg(Request $request){
        $request->validate([
            'msg' => 'required'
        ]);

        Message::create([
            'sender_id' => auth()->user()->id,
            'receiver_id' => $request->receiver_id,
            'product_id' => $request->product_id,
            'msg' => $request->msg,
        ]);

        return response()->json(['message' => 'Message Send Success']);
    }
}
