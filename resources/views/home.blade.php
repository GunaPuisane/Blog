@extends ('layouts.page')

@section ('content')
<!-- page identificator -->
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
    <?php $segments = ''; ?>
    @foreach(Request::segments() as $segment)
        <?php $segments .= '/'.$segment; ?>
        <li>
            <a href="{{ $segments }}">{{$segment}}</a>
        </li>
    @endforeach
</ol>

<!-- for photo slides -->
<div class="w3-content w3-display-container">
  <img class="mySlides" src="/images/slide1.jpg">
  <img class="mySlides" src="/images/slide2.jpg">
  <img class="mySlides" src="/images/slide3.jpg">
  <div class="w3-center w3-display-bottommiddle" style="width:100%">

</div>

<!-- for recent articles -->
@foreach($articles as $article)
  <div class="recentArticles">
  <h1><a class="article-title-home" href="articles/{{$article->id}}">{{ $article->title }}</a></h2>
  @if($article->image)
    <img src="{{asset('images/' . $article->image) }}" height="100" width="200"/>
   @endif
  <p class="article-text-home"> {{ Str_limit( $article->body,150 ) }}</p>
    <!-- show read more -->
    <p><a class="btn btn-secondary" href="articles/{{$article->id}}" role="button">Read More »</a></p>
</div> 
  @endforeach

@endsection
