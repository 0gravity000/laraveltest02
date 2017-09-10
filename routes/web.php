<?php

use App\Task;


//dd(resolve('App\Billing\Stripe'));

//App::instance('App\Billing\Stripe', $stripe);
//$stripe = resolve('App\Billing\Stripe');
//dd($stripe);

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

Route::get('/','PostsController@index')->name('home');

Route::get('/posts/create','PostsController@create');

Route::post('/posts','PostsController@store');

Route::get('/posts/{post}','PostsController@show');

Route::post('/posts/{post}/comments','CommentsController@store');

Route::get('/register','RegistrationController@create');
Route::post('/register','RegistrationController@store');
Route::get('/login','SessionController@create');
Route::post('/login','SessionController@store');
Route::get('/logout','SessionController@destroy');

//Route::get('/register','AuthController@register');
//Route::get('/login','AuthController@login');

/*
posts

GET /posts
GET /posts/create
POST /posts
GET /posts/{id}/edit
GET /posts/{id}
PATCH /posts/{id}
DELETE /posts/{id}
*/



// Controller => PostsController
// Eloquent model => Post
// migration => create_post_table


/*

Route::get('/tasks','TasksController@index');

Route::get('/tasks/{task}','TasksController@show');

Route::get('/', function () {
    return view('welcome');
});

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
