<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Task;
use App\Models\User;
use App\Models\Stask;
use DB;

class TaskController extends Controller
{
    //see the home page
    public function index(Request $req){

        $user = User::findOrFail(Auth::user()->idUse);
        $tasks = $user->task();
        // if the date of the task is less than the current date, it will be set to not completed
        foreach($tasks as $item){
            if($item->date < now()->toDateString()){
                $item->status = "not completed";
                $item->save();
            }
        }
        
        return view('home', ['task' => $user->task()]);
        
    }

    //see insert form
    public function seeinsert(Request $req)
    { 

        return view('task.new') ;
        
    }
    // insert a task
    public function insert(Request $req)
    { 

        $task = new Task ;
        $task->title = $req->title ;
        $task->description = $req->description ;
        $task->date = $req->date ;
        $task->status = $req->status ;
        $task->idUse = Auth::user()->idUse;
        $task->save();

        return redirect()->route('home') ;

        

    }
     //see edit form
    public function seedit(Request $req, Task $task)
    { 
        return view('task.edit', ['task' => $task]);
    }
    // edit a task
    public function edit(Request $req)
    { 
        $task = Task::find($req->idTas);
        $task->title = $req->title;
        $task->description = $req->description;
        $task->date = $req->date;
        $task->save();
        return redirect()->route('home') ;
    }
    //Delete Task
    public function delete(Request $req, Task $task)
    { 
        $task->delete() ;
        return redirect()->route('home') ;

    }
    //save a task
    public function save(Request $req, Task $task)
    { 
        if($task->saved == false){

         $task1 = Task::find($task->idTas);
         $task1->saved = true;
         $task1->save();

         $stask = new Stask ;
         $stask->idUse = Auth::user()->idUse;
         $stask->idTas = $task->idTas;
         $stask->title = $task->title;
         $stask->description = $task->description;
         $stask->save();

        }

        return redirect()->route('home') ;


        
    }

    //sets the status to complete
    public function complete(Request $req, Task $task)
    { 
        $task->status = "complete";
        $task->save();
        return redirect()->route('home') ;

    }


    
}
