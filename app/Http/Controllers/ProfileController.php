<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function create()
    {
        $user = auth()->user();
        return view('profiles.create', compact('user'));
    }


    public function store(Request $request)
    {
//        dd(json_encode($request->get('data')));
        $user = auth()->user();
        $user->data = $request->get('data');
        $user->save();
    }



}
