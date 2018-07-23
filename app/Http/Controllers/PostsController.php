<?php
namespace App\Http\Controllers;

use App\Post;
use App\Repositories\Posts;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PostsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }


    public function index() //controller action
    {
       // $posts = $posts->all();
        
        $posts = Post::latest()
        ->filter(request(['month','year']))
        ->get();
        
    	return view('posts.index', compact('posts'));
    }


    public function show(Post $post)
    {

    	return view('posts.show', compact('post'));
    }


    public function create()
    {
    	return view('posts.create');
    }


    public function store()
    {

    	//Create a new post using the request data

    	/*$post = new Post; //or \Ap\Post
    	$post->title = request('title');
    	$post->body = request('body');

    	 //Save it to the database 

    	$post->save();

    	
    	Post::create([ 
           request(['tille', 'body'])
    		'title' => request('title'),
    		'body' => request('body')
    	]);
		*/

    	//validate input info
    	$this->validate(request(), [
    		'title' => 'required',
    		'body' => 'required'
    	]);

        auth()->user()->publish(
            new Post(request(['title', 'body']))
        );

    	// Post::create(request(['title', 'body']));

        session()->flash(
            'message', 'Your post has now been published.');

    	//And then redirect to the home page.
    	return redirect('/');
    }
}
