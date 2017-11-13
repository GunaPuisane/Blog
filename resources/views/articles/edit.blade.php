@extends ('layouts.page')

@section ('content')

<!-- page identificator -->
<ol class="breadcrumb">
    <li><a href="/"><i class="fa fa-dashboard"></i>Home</a></li>
    <?php $segments = ''; ?>
    @foreach(Request::segments() as $segment)
        <?php $segments .= '/'.$segment; ?>
        <li>
            <a href="{{ $segments }}">{{$segment}}</a>
        </li>
    @endforeach
</ol>

 <h4 class="title">Edit Your article</h4>
 
 <div class="row">
 {!! Form::model($article, ['route' => ['articles.update', $article->id], 'method' => 'PUT']) !!}
 <div class="col-md-8">
     {{ Form::label('title', 'Title:') }}
     {{ Form::text('title', null, ["class" => 'form-control input-lg']) }}
     
     {{ Form::label('body', 'Text:', ['class' => 'form-spacing-top']) }}
     {{ Form::textarea('body', null, ['class' => 'form-control']) }}

     {{ Form::label('image', 'Upload photo:', ['class' => 'form-spacing-top']) }}
     {!! Form::file('image') !!}
 </div>

 <div class="col-md-4">
     <div class="well">
         <dl class="dl-horizontal">
             <dt>Created At:</dt>
             <dd>{{ date('M j, Y h:ia', strtotime($article->created_at)) }}</dd>
         </dl>

         <dl class="dl-horizontal">
             <dt>Last Updated:</dt>
             <dd>{{ date('M j, Y h:ia', strtotime($article->updated_at)) }}</dd>
         </dl>
         <hr>
         <div class="row">
             <div class="col-sm-6">
                 {!! Html::linkRoute('articles.articlesAll', 'Cancel', array($article->id), array('class' => 'btn btn-danger btn-block')) !!}
             </div>
             <div class="col-sm-6">
                 {{ Form::submit('Save Changes', ['class' => 'btn btn-success btn-block']) }}
             </div>
 {{ Form::close() }}
</div>


@endsection

