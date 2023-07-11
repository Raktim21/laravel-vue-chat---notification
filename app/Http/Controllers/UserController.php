<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function me(){
        
        return response()->json([
            'me' => Auth::user()
        ]);
    }


    public function allUsers(){
        return response()->json([
            'users' => User::where('id', '!=', Auth::user()->id)->get()
        ]);
    }
}
