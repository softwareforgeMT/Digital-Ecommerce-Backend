<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Google tag (gtag.js) -->
    {!! $gs->google_analytics_code !!}

    @include('front.layouts.head')
  </head>
  <body>
    @include('front.layouts.header')

     @yield('content')

    @include('front.layouts.footer')


        <!--Start of Tawk.to Script-->
         {!! $gs->chat_code !!}
        <!--End of Tawk.to Script-->
    @include('front.layouts.scripts')

  </body>
</html>
