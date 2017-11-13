
@extends ('layouts.page')

@section('content')

<!-- page identificator -->
<ol class="breadcrumb">
    <li><a href="/"><i class="fa fa-dashboard"></i>Home</a></li>
    <?php $segments = ''; ?>
    @foreach(Request::segments() as $segment)
        <?php $segments .= '/'.$segment; ?>
        <li>
        @if($segment == 'register')
            <a href="{{ $segments }}">Register</a>
            @endif
        </li>
    @endforeach
</ol>

<div class="login">
    <!-- Display the errors -->
@if ($errors->any())
<ul style="color:red;">
{{ implode('', $errors->all(':message')) }}
</ul>
@endif
 
@if (Session::has('message'))
<p>{{ Session::get('message') }}</p>
@endif
        <h3 class=title> Sign up </h3>
<!-- Form for user registartion -->
        {{ Form::open(array('url' => '/register/create')) }}

            <p>Username: </p>
            <p>{{ Form::text('username') }}</p>
            <p>First name: </p>
            <p>{{ Form::text('first_name') }}</p> 
            <p>Last name: </p>
            <p>{{ Form::text('last_name') }}</p>
            <p>Password :</p>
            <p>{{ Form::password('password') }}</p>
            <p>Confirm Password :</p>
            <p>{{ Form::password('password_confirmation') }}</p>
            <p>{{Form::submit('Register')}}</p>
        {{ Form::close() }}
</div>        
@endsection