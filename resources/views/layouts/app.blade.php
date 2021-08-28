<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    @stack('prepend-style')
    @include('includes/style')
    @stack('addon-style')

    <title>@yield('title') &mdash; minim</title>
  </head>
  <body id="home">
    
    @stack('my-navbar')

    @yield('content')

    @include('includes/footer')

    @stack('prepend-script')
    @include('includes/script')
    @stack('addon-script')
  </body>
</html>