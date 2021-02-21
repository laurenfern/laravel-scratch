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
    // use the create method to create an instance, and request method to validate, 
    //  then fill the instance with an array of data from the form, and persist it
    Article::create($this->validateArticle());

    return redirect(route('articles.index')); // send the user back to the Articles index page
  }
  
  // Show a view to edit an existing resource
  public function edit(Article $article)
  {
    return view('articles.edit', ['article' => $article]); // pass the article to the edit view
  }
  
  // Persist the edited resource
  public function update(Article $article)
  {
    // use the update method. don't need to use create method bc there's already a created instance
    // use the request method to validate
    $article->update($this->validateArticle());

    return redirect(route( $article->path() ));
  }

  // validateArticle function can be used in both show and update bc the items being validated are the same in both places
  protected function validateArticle()
  {
    return request()->validate([
      'title' => 'required',
      'excerpt' => 'required',
      'body' => 'required'
      ]);
  }

  // Delete the resource
  public function destroy()
  {
  }
}
