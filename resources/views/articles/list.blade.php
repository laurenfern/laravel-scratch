@extends ('layout')

@section ('content')
<div id="wrapper">
  <div id="page" class="container">
    <div id="content">
      <div class="title">
        <h2>Welcome to our website</h2>
        <span class="byline">Mauris vulputate dolor sit amet nibh</span> </div>
      <p><img src="images/banner.jpg" alt="" class="image image-full" /> </p>
      <ul class="style1">
        <!-- this is Blade syntax -->
        @foreach ($articles as $article)
          <li class="first">
            <h3>
              <a href="/articles/{{$article->id}}">{{ $article->title }}</a>
            </h3>
            <p><a href="#">{{ $article->excerpt }}</a></p>
          </li>
        @endforeach
        <!-- end Blade syntax -->
      </ul>
    </div>
  </div>
</div>

@endsection