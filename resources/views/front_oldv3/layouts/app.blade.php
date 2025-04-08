<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-topbar="light" data-layout-mode="light" data-sidebar-image="none"  data-preloader="disable">

  <head>
    <!-- Google tag (gtag.js) ---->
    {!! $gs->google_analytics_code !!}
 
     @include('front.layouts.head-css')      
  </head>
    <body data-bs-spy="scroll" data-bs-target="#navbar-example">
        <div class="layout-wrapper landing apt_front_custom">
                @include('front.layouts.navbar',['website_menu'=>1])

                @yield('content')

                <!-- Start footer -->
                @include('front.layouts.footer')
                <!-- end footer -->

                <!--preloader-->
                <div id="preloader" >
                    <div id="status">

                        <div class="spinner-border text-primary avatar-sm" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </div>
                </div>
                
               
               
        </div>
        <!--Start of Tawk.to Script-->
         {!! $gs->chat_code !!}
        <!--End of Tawk.to Script-->  
        @include('front.layouts.vendor-scripts')
    </body>
    


</html>
