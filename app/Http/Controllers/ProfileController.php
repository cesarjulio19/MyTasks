<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use DB;

class ProfileController extends Controller
{
    //see the saved tasks
    public function index(Request $req){

        $user = User::findOrFail(Auth::user()->idUse);
        
        return view('profile.seeprofile', ['user' => $user]);
        
    }

    //see the saved tasks
    public function restartg(Request $req){

        $user = User::findOrFail(Auth::user()->idUse);
        $user->comtasks = 0;
        $user->noctasks = 0;
        $user->save();
        
        return view('profile.seeprofile', ['user' => $user]);
        
    }
}
