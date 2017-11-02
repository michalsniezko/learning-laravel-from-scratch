<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Repositories\PostRepository;
use App\Tag;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index(PostRepository $postRepository) // Laravel's automatic dependency injection
    {
        $posts = $postRepository->all();
        return view('post.index', compact('posts'));
    }

    public function show(Post $post) //route model binding
    {
        return view('post.show', compact('post'));
    }

    public function create()
    {
        return view('post.create');
    }

    public function store()
    {
        $this->validate(\request(), [
            'title' => 'required',
            'body' => 'required'
        ]);

        auth()->user()->publish(
            new Post(request(['title', 'body']))
        );

        session()->flash('message', 'Your post has now been published.');

        //And then redirect to the home page
        return redirect('/');

        //Possible if App\Post has $fillable or $guarded propreties:
//        Post::create(['title'=>request('title')]);
    }
}
