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

    public function chatPage(){
        return view('user.chat.index');
    }

    public function getAllUsers(){
        $chats = Message::orderBy('id','DESC')
                ->where('sender_id',auth()->id())
                ->orWhere('receiver_id',auth()->id())
                ->get();

        $users = $chats->map(function($chat){
            if ($chat->sender_id === auth()->id()) {
                return $chat->receiver;
            }
            return $chat->sender;

        })->unique();

        return $users;
    }

    public function useMsgById($userId){
        $user = User::find($userId);
        if ($user) {
            $messages = Message::where(function($query) use ($userId){
                $query->where('sender_id',auth()->id());
                $query->where('receiver_id',$userId);
            })->orWhere(function($query) use ($userId){
                 $query->where('sender_id',$userId);
                 $query->where('receiver_id',auth()->id());
            })->with(['user','product'])->get();
          
            return response()->json([
                'user' => $user,
                'messages' => $messages,
            ]);
        }else {
            abort(404);
        }
    }
}
