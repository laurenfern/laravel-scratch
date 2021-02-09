<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostsController extends Controller
{
  public function show($slug)
  {
    // This query says "using the DB class, look in the table named 'posts', where the 'slug'column 
    // is equal to the value we got from the URI (the $slug argument in the show function above), and 
    // give me the first result.
    $post = \DB::table('posts')->where('slug', $slug)->first();

    // We're now fetching data from a database, so no need to hardcode the blog posts here.
    // $posts = [
    //   'my-first-post' => 'Hello, this is my first blog post. ',
    //   'my-second-post' => 'Now I am getting the hang of this blogging thing.'
    // ];

    return view('post', [
      'post' => $post
    ]);
  }
}

