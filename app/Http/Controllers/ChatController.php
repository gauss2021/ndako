<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChatController extends Controller
{

    public function __construct()
    {
        $this->middleware('okchat');
    }
    public function chatWithProprietaire()
    {

        return view('chat.chatwithproprietaire');
    }
}