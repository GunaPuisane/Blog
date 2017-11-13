
<body>
<div class="navbar">
        <img class="logo" src="/images/logo.jpg">
        <!-- navbar for guest  -->
        @if (auth()->guest())
        <span class="hello"> Hello, Guest! </span>
        <ul class="nav">
        <li class="link"><a href="/">Home</a></li>
        <li class="link"><a href="/articles/articlesAll">Articles</a></li>
        <li class="link"><a href="/login">Login</a></li>
        <li class="link"><a href="/register">Register</a></li>
         </ul>
         <!-- Text for user -->
         @else 
         <span class="hello"> Hello, {{ auth()->user()->username }}! :) </span>
        <ul class="nav">
            <li class="link"><a href="/">Home</a></li>
            <li class="link"><a href="/articles/articlesAll">Articles</a></li>
            <li class="link"><a href="/logout">Logout</a>{{ csrf_field() }}</li>
        </ul>
        @endif
</div>


