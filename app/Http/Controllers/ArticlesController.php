<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
  // Render a list of a resource.
  public function index()
  {
    $articles = Article::latest()->get();

    return view('articles.index', ['articles' => $articles]);
  }

  // Show a single resource
  public function show(Article $article)
    {
        /*  $article = Article::findOrFail($id); 
            don't need to write the query anymore, bc Laravel accepts the Article model
            as a parameter in the show function. So behind the scenes, it writes the following query 
                Article::where('id', 1)->first();
            note: the wildcard in routes/web.php ie Route::get('/articles/{article}' has to 
            exactly match the second parameter in the show function. 
            ex) in routes/web.php   Route::get('/articles/{foobar}' 
            in ArticlesController.php 
              public function show(Article $foobar)
              return view('articles.show', ['article' => $foobar])
        */
      return view('articles.show', ['article' => $article]);
    }

    // Shows a view to create a new resource
  public function create()
  {
    return view('articles.create');
  }

  // Persist the new resource (save it)
  public function store()
  {
    request()->validate([
      'title' => 'required',
      'excerpt' => 'required',
      'body' => 'required'
    ]);
    
    $article = new Article(); //create a new article instance
    
    $article->title = request('title'); // fill the article instance with the data from the form
    $article->excerpt = request('excerpt');
    $article->body = request('body');

    $article->save(); // persist 

    return redirect('/articles'); // send the user back to the Articles index page
  }
  
  // Show a view to edit an existing resource
  public function edit($id)
  {
    $article = Article::find($id); // find the article with this id
    return view('articles.edit', ['article' => $article]); // pass the article to the edit view
    // another way to write this is return view('articles.edit', compact('article'));
  }
  
  // Persist the edited resource
  public function update($id)
  {
      request()->validate([
       'title' => 'required',
       'excerpt' => 'required',
       'body' => 'required'
      ]);
    
    $article = Article::find($id); // find the article with this id

    $article->title = request('title');
    $article->excerpt = request('excerpt');
    $article->body = request('body');
    $article->save();

    return redirect('/articles/' . $article->id);
  }

  // Delete the resource
  public function destroy()
  {
  }
}
