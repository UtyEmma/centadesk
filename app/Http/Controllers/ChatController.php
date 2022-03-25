<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChatController extends Controller{

    function fetchChats (Request $request){
        return view('front.student.chat.chats');
    }

    function fetchSingleChat(Request $request){
        return view('front.student.chat.single-chat');
    }

    function sendMessage(Request $request){

    }
}
