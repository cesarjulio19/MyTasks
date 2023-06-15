<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Ttask;
use App\Models\Rtask;
use DB;

class RtaskController extends Controller
{    
    //see the recommended tasks of a task type
    public function index(Request $req, Ttask $ttask){
        $ttasks = Ttask::find($ttask->idTta);
        $rtasks = $ttasks->rtask();
        $user = User::findOrFail(Auth::user()->idUse);
        
        return view('rtask.seertask',['user' => $user, 'rtask' => $rtasks, 'ttask' => $ttask]);
        
    }

    //insert recommended tasks
    public function insert(Request $req)
    { 

        $rtask = new Rtask ;
        $rtask->idTta = $req->idTta ;
        $rtask->title = $req->title ;
        $rtask->description = $req->description ;
        $rtask->save();
        
        $user = User::findOrFail(Auth::user()->idUse);
        $typeT = Ttask::all() ;
        
        return view('ttask.seettask',['user' => $user, 'ttask' => $typeT]);

    }

    //Delete Rtask
    public function delete(Request $req, Rtask $rtask)
    { 
        $rtask->delete() ;
        
        $user = User::findOrFail(Auth::user()->idUse);
        $typeT = Ttask::all() ;
        
        return view('ttask.seettask',['user' => $user, 'ttask' => $typeT]);
    }

    //see the add form
    public function seeadd(Request $req, Rtask $rtask)
    { 

        return view('rtask.add', ['rtask' => $rtask]) ;
        
    }

    //see edit form
    public function seedit(Request $req, Rtask $rtask)
    { 
        $ttask = Ttask::find($rtask->idTta);
        $rtasks = $ttask->rtask();
        $user = User::findOrFail(Auth::user()->idUse);
        return view('rtask.edit', ['rtask' => $rtask, 'rtasks' => $rtasks, 'ttask' => $ttask, 'user' => $user ]);
    }

    // edit a task
    public function edit(Request $req)
    { 
        $rtask = Rtask::find($req->idRta);
        $rtask->title = $req->title;
        $rtask->description = $req->description;
        $rtask->save();
        return redirect()->route('ttask.seettask') ;
    }
}
