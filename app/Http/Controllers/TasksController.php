<?php

namespace App\Http\Controllers;

use App\Task;
//use Illuminate\Http\Request;

class TasksController extends Controller
{
  public function index()
  {
    $tasks = Task::all();
    return view('tasks.index', compact('tasks'));
  }

  public function show(Task $task)  //Task::find(wildcard)
  //public function show($id)
  {
    //$task = Task::find($id);
    //return $task;
    return view('tasks.show', compact('task'));
  }

}
