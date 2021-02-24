@extends ('layout')

@section ('content')
<div id="wrapper">
  <div id="page" class="container">
    <div id="content">
      <ul class="style1">
        <!-- this is Blade syntax -->
        @forelse ($articles as $article)
          <li class="first">
            <h3>
              <a href="{{ route('articles.show', $article) }}">
                {{ $article->title }}
              </a>
            </h3>
            <p><img src="images/banner.jpg" alt="" class="image image-full" /> </p>
            <p><a href="#">{{ $article->excerpt }}</a></p>
          </li>
        @empty
          <p>No relevant articles yet.</p>
        @endforelse
        <!-- end Blade syntax -->
      </ul>
    </div>
  </div>
</div>

@endsection