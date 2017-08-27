<?php

use App\Task;

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
Route::get('/tasks','TasksController@index');

Route::get('/tasks/{task}','TasksController@show');

Route::get('/', function () {
    return view('welcome');
});

/*
Route::get('/tasks', function () {
    $tasks = Task::all();
    //$tasks = DB::table('tasks')->latest()->get();
    //dd($task);
    return view('tasks.index', compact('tasks'));
});

Route::get('/tasks/{task}', function ($id) {
    $task = Task::find($id);
    //$task = DB::table('tasks')->find($id);
    //dd($task);
    return view('tasks.show', compact('task'));
});

*/
