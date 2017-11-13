@extends ('layouts.page')

@section ('content')

<!-- page identificator -->
<ol class="breadcrumb">
    <li><a href="/"><i class="fa fa-dashboard"></i>Home</a></li>
    <?php $segments = ''; ?>
    @foreach(Request::segments() as $segment)
        <?php $segments .= '/'.$segment; ?>
        <li>
        @if($segment>0)
            <a href="{{ $segments }}">Reading Article</a>
            @endif
            <a href="{{ $segments }}">{{$segment}}</a>
          
        </li>
    @endforeach
</ol>
<div class = "row">
    <div class="col-md-8 col-md-offset-2">
        <div class="openArticle">
            <div class="editdelete">
                <!-- condition if user is login -->
                @if(auth()->user())   
                @if(Auth::user()->id == $article->user_id) 
                {{  Form::open(['action' => ['ArticleController@delete', $article]]) }}
                    <p> {{Form::submit ('Delete')}}</p>
                {{Form::close ()}}    
                {{  Form::open(['action' => ['ArticleController@edit', $article]]) }}
                    <p> {{Form::submit ('Edit')}}</p>
                {{Form::close ()}}    
                @endif
                @endif
            </div>
            <!-- open article title -->
                <p class="article-title">{{ $article->title }}</p>
                        <article class="article-text"> {{$article->body}}</article>
                        </br>
                        <p style="font-size: 12px">Author: {{ $article->author}} , Created at {{ $article->created_at->format('M j, Y') }}</p>
                             @if($article->image)
                                 <img src="{{asset('images/' . $article->image) }}" height="300" width="600"/>
                             @endif
        </div>    
    </div>
</div>
@endsection