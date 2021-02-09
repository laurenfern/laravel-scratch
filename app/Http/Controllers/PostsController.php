<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// import the DB class. DB is in the global namespace, not the current namespace App\Http\Controllers
use DB;
// pull in Post
use App\Models\Post;
class PostsController extends Controller
{
  public function show($slug)
  {
    // This query says "using the DB class, look in the table named 'posts', where the 'slug'column 
    // is equal to the value we got from the URI (the $slug argument in the show function above), and 
    // give me the first result.
    // Note that we are accessing the DB class from the global namespace. To do so, we import it on line 6. 
    // If you don't import the DB class, it will fail bc it will assume the DB class is in the current namespace App\Http\Controllers
    // Another way to do this would be to put a backslash before DB like so : 
    // $post = \DB::table('posts')->where('slug', $slug)->first();


      // the firstOrFail() does this check for us. If no post is found, it will 404.
      // if (! $post){
        // abort(404);
      // }

    return view('post', [
      'post' => Post::where('slug', $slug)->firstOrFail()
    ]);
  }
}

