<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function(){
    return view('welcome');
});

Route::get('/contact', function(){
    return view('contact');
});

Route::get('/about', function(){
  return view('about', [
    'articles' => App\Models\Article::take(3)->latest()->get()
  // other options besides fetching all records in reverse chron order
  // take # like ::take(2)->get();
  // paginate in sets of # like ::paginate(2);
  ]);
});

Route::get('/articles', function(){
	return view('articles.index', [
		'articles' => App\Models\Article::latest()->get()
	]);
});

// had to include the full path to ArticlesController, unlike in the lesson 15 video. 
// otherwise, get an error `Target class [ArticlesController] does not exist`.
Route::get('/articles', 'App\Http\Controllers\ArticlesController@index');
Route::get('articles/create', 'App\Http\Controllers\ArticlesController@create');
// a route with a wildcard, like /articles/{article}, will take precedence over any route below it,
// so put the other /articles routes above it
Route::get('/articles/{article}', 'App\Http\Controllers\ArticlesController@show');
 

//slightly modified from the lesson 8, bc the code from the lesson doesn't work in PHP 8.x
// see https://laravel.com/docs/8.x/routing#basic-routing
// add a use statement and a show method for the PostsController
use App\Http\Controllers\PostsController;
Route::get('posts/{post}', [PostsController::class, 'show']);