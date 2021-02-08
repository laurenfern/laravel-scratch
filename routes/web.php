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

// the {post} is a wildcard, it will accept anything. 
// Ex) the URI http://laravel6tutorial.test/posts/asdfgh would work, and $post would be set to 'asdfgh'
Route::get('/posts/{post}', function ($post) {
    $posts = [
        'my-first-post' => 'Hello, this is a first blog post.',
        'my-second-post' => 'Now I am getting the hang of this blogging thing.'
    ];

    // check if the string from the URI (the $post) matches a key (ie slug) in the $posts array
    if (!array_key_exists($post, $posts)) {
        abort(404, 'Sorry, that post was not found.');
    }
 
    return view('post', [
        // this is the data to be passed to the 'post' view at resources/views/post.blade.php
        'post' => $posts[$post]
    ]);
});

Route::get('/', function(){
    return view('welcome');
});