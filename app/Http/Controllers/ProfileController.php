<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ProfileController extends Controller
{
    public function create()
    {
        $user = auth()->user();
        return view('profiles.create', compact('user'));
    }


    public function store(Request $request)
    {
        $user = auth()->user();
        $user->data = $request->get('data');
        $user->save();

        return redirect()->route('home');
        //return Redirect::back()->with('message', 'Profile Created or Updated Successfully');
    }



}
