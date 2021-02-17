<!-- this edit view is similar to the create view, except that it pulls in the current values from
the article being edited, and uses those values as the "default values" for each field -->

@extends('layout')

@section('head')
<!-- pulling in this stylesheet just for this view -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.css">
@endsection

@section('content')
  <div id="wrapper">
    <div id="page" class="container">
      <h1 class="heading has-text-weight-bold is-size-4">Update Article</h1>

      <!-- here, submitting a POST request to the server ie method="POST", bc the browser only understands
      requests for POST and GET. but as part of that POST request we give more info to Laravel 
      in the directive @method('PUT'). This is a hidden input (@csrf is also a hidden input) and it tells
      Laravel that what we actually want is a PUT request-->
      <form method="POST" action="/articles/{{ $article->id }}">
        <!-- always include the @csrf directive to protect against Cross Site Request Forgery -->
        @csrf 
        @method('PUT')
        <div class="field">
          <label class="label" for="title">Title</label>
          <div class="control">
            <input class="input" type="text" name="title" id="title" value="{{$article->title}}">
          </div>
        </div>

        <div class="field">
          <label class="label" for="excerpt">Excerpt</label>
          <div class="control">
          <textarea class="textarea" name="excerpt" id="excerpt">{{$article->excerpt}}</textarea>
          </div>
        </div>

        <div class="field">
          <label class="label" for="body">Body</label>
          <div class="control">
            <textarea class="textarea" name="body" id="body">{{$article->body}}</textarea>
          </div>
        </div>

        <div class="field is-grouped">
          <div class="control">
            <button class="button is-link" type="submit">Submit</button>
          </div>

      </form>
    </div>
  </div>
@endsection