<?php

namespace App\Http\Controllers;

use App\Message;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $receipt = auth()->user()->receipt()->first();
        $messages = Message::all();

        if ($user->upline_id) {
            $upline = User::find($user->upline_id);
            return view('home', compact(['user', 'upline', 'receipt','messages']));
        }
        return view('home', compact(['user', 'upline', 'receipt','messages']));
    }
}
