<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
  public function index()
  {
    // Render a list of a resource.
    $articles = Article::latest()->get();

    return view('articles.index', ['articles' => $articles]);
  }

  public function show($id)
    {
      // Show a single resource
      $article = Article::find($id);

      return view('articles.show', ['article' => $article]);
    }

  public function create()
  {
    // Shows a view to create a new resource
    return view('articles.create');
  }

  public function store()
  {
    // Persist the new resource (save it)
    $article = new Article(); //create a new article instance
    
    $article->title = request('title'); // fill the article instance with the data from the form
    $article->excerpt = request('excerpt');
    $article->body = request('body');

    $article->save(); // persist 

    return redirect('/articles'); // send the user back to the Articles index page
  }
  
  public function edit($id)
  {
    // Show a view to edit an existing resource
    $article = Article::find($id); // find the article with this id
    return view('articles.edit', ['article' => $article]); // pass the article to the edit view
    // another way to write this is return view('articles.edit', compact('article'));
  }
  
  public function update($id)
  {
    // Persist the edited resource
    $article = Article::find($id); // find the article with this id

    $article->title = request('title');
    $article->excerpt = request('excerpt');
    $article->body = request('body');
    $article->save();

    return redirect('/articles/' . $article->id);
  }

  public function destroy()
  {
    // Delete the resource
  }
}
