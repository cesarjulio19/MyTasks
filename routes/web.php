<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController ;
use App\Http\Controllers\StaskController ;
use App\Http\Controllers\TtaskController ;
use App\Http\Controllers\RtaskController ;
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
        ->name('seeinsert') ;

    Route::post('insert', 
                [TaskController::class,'insert'])
        ->name('insert') ;

    Route::get('seedit/{task}', 
               [TaskController::class,'seedit'])
        ->name('seedit') ;

    Route::post('edit', 
                [TaskController::class,'edit'])
        ->name('edit') ;
    
    Route::get('delete/{task}', 
               [TaskController::class,'delete'])
        ->name('delete') ;

    Route::get('save/{task}', 
               [TaskController::class,'save'])
        ->name('save') ;
    
    Route::get('complete/{task}', 
               [TaskController::class,'complete'])
        ->name('complete') ;

});


//operations with stask


Route::group(['prefix' => 'stask', 
              'as'     => 'stask.'], function()
{
   
    Route::get('seestask', 
               [StaskController::class,'index'])
        ->name('seestask') ;

    Route::get('delete/{stask}', 
               [StaskController::class,'delete'])
        ->name('delete') ;

    Route::get('seeadd/{stask}', 
               [StaskController::class,'seeadd'])
    ->name('seeadd') ;


});

//operations with ttask


Route::group(['prefix' => 'ttask', 
              'as'     => 'ttask.'], function()
{
   
    Route::get('seettask', 
               [TtaskController::class,'index'])
        ->name('seettask') ;

    Route::post('insert', 
                [TtaskController::class,'insert'])
        ->name('insert') ;

    Route::get('delete/{ttask}', 
               [TtaskController::class,'delete'])
        ->name('delete') ;


});

//operations with rtask


Route::group(['prefix' => 'rtask', 
              'as'     => 'rtask.'], function()
{
   
    Route::get('seertask/{ttask}', 
               [RtaskController::class,'index'])
        ->name('seertask') ;

    Route::post('insert', 
                [RtaskController::class,'insert'])
        ->name('insert') ;

    Route::get('delete/{rtask}', 
               [RtaskController::class,'delete'])
        ->name('delete') ;

    Route::get('seeadd/{rtask}', 
               [RtaskController::class,'seeadd'])
        ->name('seeadd') ;



});





