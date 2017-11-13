
<html class="page">
    <head>
        @include('include.head')
    </head>
    <header class="header"> 
        <!-- include HTML and CSS files -->  
        @include('include.loadingPage')
        @include('include.navbar')
 
    </header>

    <body  class="content">
        <!-- content of page -->
        @yield('content')
 
  
    <footer>
         @include('include.footer')    
    </footer>

    </body>
</html>

