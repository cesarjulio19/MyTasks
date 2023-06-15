<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController ;
use App\Http\Controllers\StaskController ;
use App\Http\Controllers\TtaskController ;
use App\Http\Controllers\RtaskController ;
use App\Http\Controllers\ProfileController ;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();

//Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

//Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');*/

Route::get('/home', [TaskController::class,'index'])
 ->middleware(['auth'])->name('home');

//operations with task


Route::group(['prefix' => 'task', 
              'as'     => 'task.'], function()
{
   
    Route::get('seeinsert', 
               [TaskController::class,'seeinsert'])
        ->name('seeinsert')->middleware(['auth']) ;

    Route::post('insert', 
                [TaskController::class,'insert'])
        ->name('insert')->middleware(['auth']) ;

    Route::get('seedit/{task}', 
               [TaskController::class,'seedit'])
        ->name('seedit')->middleware(['auth']) ;

    Route::post('edit', 
                [TaskController::class,'edit'])
        ->name('edit')->middleware(['auth']) ;
    
    Route::get('delete/{task}', 
               [TaskController::class,'delete'])
        ->name('delete')->middleware(['auth']) ;

    Route::get('save/{task}', 
               [TaskController::class,'save'])
        ->name('save')->middleware(['auth']) ;
    
    Route::get('complete/{task}', 
               [TaskController::class,'complete'])
        ->name('complete')->middleware(['auth']) ;

});


//operations with stask


Route::group(['prefix' => 'stask', 
              'as'     => 'stask.'], function()
{
   
    Route::get('seestask', 
               [StaskController::class,'index'])
        ->name('seestask')->middleware(['auth']) ;

    Route::get('delete/{stask}', 
               [StaskController::class,'delete'])
        ->name('delete')->middleware(['auth']) ;

    Route::get('seeadd/{stask}', 
               [StaskController::class,'seeadd'])
    ->name('seeadd')->middleware(['auth']) ;


});

//operations with ttask


Route::group(['prefix' => 'ttask', 
              'as'     => 'ttask.'], function()
{
   
    Route::get('seettask', 
               [TtaskController::class,'index'])
        ->name('seettask')->middleware(['auth']) ;

    Route::post('insert', 
                [TtaskController::class,'insert'])
        ->name('insert')->middleware('admin') ;

    Route::get('delete/{ttask}', 
               [TtaskController::class,'delete'])
        ->name('delete')->middleware('admin')  ;

    Route::get('seedit/{ttask}', 
               [TtaskController::class,'seedit'])
        ->name('seedit')->middleware('admin')  ;

    Route::post('edit', 
                [TtaskController::class,'edit'])
        ->name('edit')->middleware('admin')  ;


});

//operations with rtask


Route::group(['prefix' => 'rtask', 
              'as'     => 'rtask.'], function()
{
   
    Route::get('seertask/{ttask}', 
               [RtaskController::class,'index'])
        ->name('seertask')->middleware(['auth']) ;

    Route::post('insert', 
                [RtaskController::class,'insert'])
        ->name('insert')->middleware('admin')  ;

    Route::get('delete/{rtask}', 
               [RtaskController::class,'delete'])
        ->name('delete')->middleware('admin') ;

    Route::get('seeadd/{rtask}', 
               [RtaskController::class,'seeadd'])
        ->name('seeadd')->middleware(['auth']) ;
    
    Route::get('seedit/{rtask}', 
               [RtaskController::class,'seedit'])
        ->name('seedit')->middleware('admin') ;

    Route::post('edit', 
                [RtaskController::class,'edit'])
        ->name('edit')->middleware('admin') ;



});

//operations with profile

Route::group(['prefix' => 'profile', 
              'as'     => 'profile.'], function()
{
   
    Route::get('seeprofile', 
               [ProfileController::class,'index'])
        ->name('seeprofile')->middleware(['auth']) ;

    Route::get('restartg', 
               [ProfileController::class,'restartg'])
        ->name('restartg')->middleware(['auth']) ;


});





