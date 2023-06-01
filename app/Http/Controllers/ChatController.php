<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Models\Chat;
use App\Models\Message;


class ChatController extends Controller
{
    public function chats(Request $request) {
        return Chat::all();
    }

    public function messages(Request $request, $chatId) {
        return Message::where('chat_id', $chatId)
        ->with('user')
        ->orderBy('created_at', 'DESC')
        ->get();
    }

    public function storeMessage(Request $request, $chatId) {
        $message = new Message;
        $message->user_id = Auth::id();
        $message->chat_id = $chatId;
        $message->message = $request->message;

        $message->save();

        return $message;
    }
}
