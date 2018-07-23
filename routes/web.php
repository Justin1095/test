<?php
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

//dd(resolve('App\Billing\Stripe'));

Route::get('/', 'PostsController@index')->name('home');
Route::get('/posts/create', 'PostsController@create');
Route::post('/posts', 'PostsController@store');
Route::get('/posts/{post}', 'PostsController@show');

Route::get('/posts/tags/{tag}', 'TagsController@index');

Route::post('/posts/{post}/comments', 'CommentsController@store');

Route::get('/register', 'RegistrationController@create');
Route::post('/register', 'RegistrationController@store');

Route::get('/login', 'SessionsController@create');
Route::post('/login', 'SessionsController@store');
Route::get('/logout', 'SessionsController@destroy');

//Eloquent model => Post 
//controller => PostsController
//migration => create_posts_table


/* 
return view('welcome') -> with('name', 'World'); 


Route::get('/', function () {
	//If you view the home page, it will load up a view called welcome. Welcome is in resources/views
    return view('welcome', [

    	'name' => 'Laracast'

    ]); //welcome = welcome.blade.php
}); 

Route::get('/', function () {
	$tasks = [
		'Go to the store',
		'Finish my screencast',
		'Clean the house'
	];

    return view('welcome', compact('tasks')); 
}); 

Route::get('/tasks', function () {
	//Laravel Query builder
	//$tasks = DB::table('tasks')->latest()->get();

}); 


Route::get('/tasks/{task}', function ($id) {
	//$tasks = DB::table('tasks')->find($id); 

	$task = Task::find($id);
 
    return view('tasks.show', compact('task')); 
}); 

//example.com/about
Route::get('about', function () { // / is optional
    return view('about');
}); 


//Controllers - middle-man, it will recevie a request, gets the data and pass it to the view. View will then display it on the screen
Route::get('/tasks', 'TasksController@index');
Route::get('/tasks/{task}', 'TasksController@show');
*/