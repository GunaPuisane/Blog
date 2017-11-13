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
 
<div class = "row">
    <div class="col-md-8 col-md-offset-2">
        <h4 class="title">Create New Article </h4>
            {{Form::open (array ('url' => '/articles/done', 'files' =>true))}}
            <p class = "create-article-title">Write a title: </p>
            <p>{{ Form::text('title') }} </p>
            <div class="create-article">
            <p class = "create-article-title">Text: </p>
                {{Form::textarea('body')}}
                </div>
                <div class="article-file">
                <p class = "create-article-title">Upload photo: </p>
                {!! Form::file('image') !!}
                </div>
                
            <p class="donebtn"> {{Form::submit ('Done')}} </p>
            {{Form::close ()}}
    </div>  
</div>


@endsection

