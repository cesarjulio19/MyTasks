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
            if(($item->date < now()->toDateString()) && ($item->status == "inprogress" ) ){
                $item->status = "not completed";
                $item->save();

                $user->inptasks = $user->inptasks - 1;
                $user->noctasks = $user->noctasks + 1;
                $user->save();

                
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

        $user = User::findOrFail(Auth::user()->idUse);
        $user->inptasks = $user->inptasks + 1;
        $user->save();

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
        $values = [
          'title' => $req->title,
          'description' => $req->description,
          'date' => $req->date
        ];

        $query = DB::table('task')->where('idTas',$req->idTas)->update($values);
        if($query){
            return response()->json(['status'=>1, 'msg'=>'the task has been edited successfully, return to the home page to see the changes']);
        }else{
            return response()->json(['status'=>0, 'msg'=>'the task has not been edited successfully, please try again']);
        }
    }
    //Delete Task
    public function delete(Request $req, Task $task)
    { 
        if($task->status == "inprogress"){
            $user = User::findOrFail(Auth::user()->idUse);
            $user->inptasks = $user->inptasks - 1;
            $user->save();
        }

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
        if($task->status == "inprogress"){
            $task->status = "complete";
            $task->save();

            $user = User::findOrFail(Auth::user()->idUse);
            $user->inptasks = $user->inptasks - 1;
            $user->comtasks = $user->comtasks + 1;
            $user->save();
        }
        
        return redirect()->route('home') ;

    }


    
}
