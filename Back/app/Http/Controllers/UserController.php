<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //

    public function index()
    {
        return Auth::user();
    }


    //
    public function update(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $user->name = $request->name;
        $user->adress = $request->adress;
        $user->phone_number  = $request->phone_number;
        $user->save();
        return $user;
    }
}
