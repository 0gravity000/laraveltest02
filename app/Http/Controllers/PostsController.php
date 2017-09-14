<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Repositories\Posts;
use Carbon\Carbon;

class PostsController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth')->except(['index', 'show']);
    }

    public function index() //
    {
      //dd($posts);
      //$posts = $posts->all();
      //$posts = (new \App\Repositories\Posts)->all();

      $posts = Post::latest()
        ->filter(request(['month', 'year']))
        ->get();

/*
        $posts = $posts->get();
        //$posts = Post::latest()->get();
        //$posts = Post::orderBy('created_at', 'desc')->get();
*/

      //$archives = Post::archives();
      //return $archives;
      return view('posts.index', compact('posts'));
      //return view('posts.index'->with('posts', $posts);
      //return view('posts.index', compact('posts', 'archives'));
    }

    public function show(Post $post)
    {
      return view('posts.show', compact('post'));
      //$post = Post::find($id);
    }

    public function create()
    {
      return view('posts.create');
    }

    public function store()
    {
      //dd(request()->all());
      //Create a new post using the request data
//      $post = new Post;
//      $post->title = request('title');
//      $post->body = request('body');

      //Save it to the database
//      $post->save();
      $this->validate(request(), [
        'title' => 'required',
        'body' => 'required',
      ]);

      auth()->user()->publish(
        new Post(request(['title', 'body']))
      );

      session()->flash(
        'message', 'Your post has now been publish.'
      );

//      Post::create([
//        'title' => request('title'),
//        'body' => request('body'),
//      ]);

      //And then redirect to the home page.

      return redirect('/');

    }

}
