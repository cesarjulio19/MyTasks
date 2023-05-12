<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Task;
use App\Models\User;
use App\Models\Stask;
use DB;

class StaskController extends Controller
{   
    //see the saved tasks
    public function index(Request $req){

        $user = User::findOrFail(Auth::user()->idUse);
        
        return view('stask.seestask', ['stask' => $user->stask()]);
        
    }
    //Delete Stask
    public function delete(Request $req, Stask $stask)
    { 
        if($stask->idTas == null){
            $stask->delete() ;
            return redirect()->route('stask.seestask') ;
        }else{

            $task = Task::find($stask->idTas);
            $task->saved = false;
            $task->save();
            $stask->delete() ;
            return redirect()->route('stask.seestask') ;

        }
        
        

    }
    //see the add form
    public function seeadd(Request $req, Stask $stask)
    { 

        return view('stask.add', ['stask' => $stask]) ;
        
    }


}
