@yield('css')
@stack('partial_css')
<!-- Layout config Js -->
<script src="{{ URL::asset('assets/js/layout.js') }}"></script>
<!-- Bootstrap Css -->
<link href="{{ URL::asset('assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
<!-- Icons Css -->
<link href="{{ URL::asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
<!-- App Css-->
<link href="{{ URL::asset('assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
<!-- custom Css-->
<link href="{{ URL::asset('assets/css/custom.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />

<link href="{{ URL::asset('assets/css/new-custom.css') }}" id="app-style" rel="stylesheet" type="text/css" />
{{-- @yield('css') --}}

{{-- <style type="text/css">
	.dropzone .dz-preview .dz-image{
		width:100% !important;
	}
	.dropzone .dz-preview .dz-image img {
	    width: 100% !important;
	    height: 100% !important;
	}
</style> --}}