
 <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
   
<script src="{{ URL::asset('assets/libs/bootstrap/bootstrap.min.js') }}"></script>
<script src="{{ URL::asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ URL::asset('assets/libs/node-waves/node-waves.min.js') }}"></script>
<script src="{{ URL::asset('assets/libs/feather-icons/feather-icons.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/pages/plugins/lord-icon-2.1.0.min.js') }}"></script>
{{-- <script src="{{ URL::asset('assets/js/plugins.min.js') }}"></script> --}}
<script type='text/javascript' src='https://cdn.jsdelivr.net/npm/toastify-js'></script>



<script type='text/javascript' src='{{ URL::asset('assets/libs/flatpickr/flatpickr.min.js')}}'></script>

@stack('partial_script')
@yield('script')
@yield('script-bottom')

<script src="{{ URL::asset('/assets/front/custom.js') }}"></script>

 <script type="text/javascript">
  var mainurl = "{{url('/')}}";
</script>

{{-- <script src="{{ asset('assets/js/custom.min.js') }}"></script> --}}

<script src="{{ URL::asset('/assets/js/pages/landing.init.js') }}"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>