<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Ttask;
use App\Models\Rtask;
use DB;

class TtaskController extends Controller
{
    //see the type tasks
    public function index(Request $req){

        $user = User::findOrFail(Auth::user()->idUse);
        $typeT = Ttask::all() ;
        
        return view('ttask.seettask',['user' => $user, 'ttask' => $typeT]);
        
    }

    // insert a type of task
    public function insert(Request $req)
    { 

        $ttask = new Ttask ;
        $ttask->Type = $req->type ;
        $ttask->save();

        $user = User::findOrFail(Auth::user()->idUse);
        $typeT = Ttask::all() ;
        
        return view('ttask.seettask',['user' => $user, 'ttask' => $typeT]);

    }

    //Delete Ttask
    public function delete(Request $req, Ttask $ttask)
    { 
        $ttask->delete() ;
        return redirect()->route('ttask.seettask') ;
    }


    
}
