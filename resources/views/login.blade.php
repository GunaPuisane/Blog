@extends ('layouts.page')

@section ('content')
<!-- page identificator -->
<ol class="breadcrumb">
    <li><a href="/"><i class="fa fa-dashboard"></i>Home</a></li>
    <?php $segments = ''; ?>
    @foreach(Request::segments() as $segment)
        <?php $segments .= '/'.$segment; ?>
        <li>
        @if($segment == 'login')
            <a href="{{ $segments }}">Login</a>
            @endif
        </li>
    @endforeach
</ol>

<div class="login">
@if ($errors->any ())
<ul style="color:red">
{{implode ('', $errors->all ('Invalid username or password'))}}
</ul>
@endif
{{Form::open (array ('url' => 'login/logincheck'))}}
<p> {{Form::text ('username', '', array ('placeholder'=>'Username','maxlength'=>30))}} </p>
<p> {{Form::password ('password', array('placeholder'=>'Password','maxlength'=>30)) }} </p>
<p> {{Form::submit ('Login')}} </p>
{{Form::close ()}}
</div>

@endsection