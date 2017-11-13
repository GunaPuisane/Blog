@extends ('layouts.page')

@section('content')

<!-- page identificator -->
<ol class="breadcrumb">
    <li><a href="/"><i class="fa fa-dashboard"></i>Home</a></li>
    <?php $segments = ''; ?>
    @foreach(Request::segments() as $segment)
        <?php $segments .= ''.$segment; ?>
        <li>
            @if($segment == 'articlesAll')
            <a href="{{ $segments }}">Articles</a>
            @endif
        </li>
    @endforeach
</ol>

<div class="articlePage">
<!-- button: create new article -->
<!-- is aviable only for sign in users -->
@if (auth()->user())
    <button type="button" class="createbtn"> <a href="/articles/0/createArticle">Create article</a></button>
@endif
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">   
            <div class="list-of-articles">
            <div class = "row">
    <!-- shows all article in list -->
    @foreach($articles as $article)
    <article class="post-item">
          <div class="post-item-body">
              <div class="padding-10">
              <h2><a class="article-title" href="/articles/{{$article->id}}">{{ $article->title }}</a></h2>
              @if($article->image)
                  <img src="{{asset('images/' . $article->image) }}" height="200" width="400"/>
                  @endif
                 <!-- Show article in limited length  -->
                  <p class="article-text"> {{ Str_limit($article->body,1000) }}</p>        
                 <!-- show article author by username -->
                  <h6>Author: {{ $article->author}} {{ $article->created_at->format('M j, Y') }}</h6>
              </div>    
          </div>         
          <div class="post-meta padding-10 clearfix">   
          </div>    
    </article>  
    @endforeach
   <div class="paginate">
    {{ $articles->links()}} 
    </div>         
            </div>    
        </div>   
    </div>    
</div>    

</div>
@endsection