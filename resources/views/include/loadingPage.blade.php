<div class="loadingPage">
   <!--This is text for header -->

@if(Route::currentRouteName() == 'home')
<p>Landing page</p>
@elseif(Route::currentRouteName() == 'login')
<p>Login page</p>
@elseif (Route::currentRouteName() == 'register')
<p>Register page</p>
@else 
<p>Articles page</p>
@endif

</div>
