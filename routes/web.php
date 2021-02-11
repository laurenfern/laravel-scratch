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
  return view('about');
});

//slightly modified from the lesson, bc the code from the lesson doesn't work in PHP 8.x
// see https://laravel.com/docs/8.x/routing#basic-routing
// add a use statement and a show method for the PostsController
use App\Http\Controllers\PostsController;
Route::get('posts/{post}', [PostsController::class, 'show']);