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
    // Note the backslash in \DB below means we are accessing the DB class from the global namespace root
    // Without that backslash, it will assume the DB class is in the current namespace App\Http\Controllers
    // Another way to do this, without putting the backslash, is to import it, ie add 'use DB' to line 6.
    $post = \DB::table('posts')->where('slug', $slug)->first();

      if (! $post){
        abort(404);
      }

    return view('post', [
      'post' => $post
    ]);
  }
}

