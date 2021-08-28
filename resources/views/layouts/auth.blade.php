<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @stack('prepend-style')
    @include('includes/auth/style')
    @stack('addon-style')

    <title>@yield('title') &mdash; minim</title>
  </head>
  <body id="home">

  	@yield('content')

  	@stack('prepend-script')
  	@include('includes/auth/script')
  	@stack('addon-script')
  </body>
</html>