<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Google tag (gtag.js) -->
    {!! $gs->google_analytics_code !!}
      <link rel="stylesheet" href="{{ asset('assets/css/front/common.css') }}" />
    @include('front.layouts.head-css')
  
  </head>
  <body>

    <div class="apt_front_custom11">
     @yield('content')
   </div>
    
      <!--Start of Tawk.to Script-->
         {!! $gs->chat_code !!}
      <!--End of Tawk.to Script--> 
    @include('front.layouts.vendor-scripts')

  </body>
</html>
