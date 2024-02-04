<!doctype html>
<html lang="en">

@include('includes.head')

  <body>

  <div class="site-wrap" id="home-section">

    @include('includes.span')

    @include('includes.header')

    @yield('content')

    @include('includes.footer')

    </div>

    @include('includes.footerjs')

  </body>

</html>

