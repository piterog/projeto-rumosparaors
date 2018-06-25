<!DOCTYPE html>
<html>
  <head>     
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
    <link rel="icon" href="images/favicon.png" type="image/x-icon"/>

    <title>{{ setting('site.title') }}</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/style.css') }}">

  </head>
  <body>
    <main class="site-content">
      {{-- @include('layouts.includes.navbar') --}}

      @yield('body')
    </main>
      {{-- @include('layouts.includes.footer')  --}}

    <script src="{{ asset('/js/jquery-3.1.1.min.js') }}"></script>
  </body>
</html>
