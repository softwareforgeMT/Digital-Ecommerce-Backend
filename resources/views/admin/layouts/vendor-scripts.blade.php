<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="{{ URL::asset('assets/libs/bootstrap/bootstrap.min.js') }}"></script>
<script src="{{ URL::asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ URL::asset('assets/libs/node-waves/node-waves.min.js') }}"></script>
<script src="{{ URL::asset('assets/libs/feather-icons/feather-icons.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/pages/plugins/lord-icon-2.1.0.min.js') }}"></script>
{{-- <script src="{{ URL::asset('assets/js/plugins.min.js') }}"></script> --}}

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
 {{-- <script src="{{ asset('common_assets/bootstrap-toastr/ui-toastr.min.js')}}" type="text/javascript"></script> --}}
<script src="{{ URL::asset('assets/js/admin-custom.min.js') }}"></script>

<script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>



@yield('script')
@stack('partial_script')

@yield('script-bottom')
