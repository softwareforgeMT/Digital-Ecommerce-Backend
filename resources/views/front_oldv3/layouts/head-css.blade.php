

    <meta charset="utf-8" />
    {{-- <title>@yield('title') | {{$gs->name}}</title> --}}
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <meta content="{{$gs->name}} Buying & selling " name="description" /> --}}
    <meta content="maalik9272@gmail.com" name="author" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />


    <!-- HTML Meta Tags -->
	<title>@yield('title') | {{$gs->name}}</title>
	<meta name="description" content="{{$gs->slogan}}">

	<!-- Google / Search Engine Tags -->
	<meta itemprop="name" content="@yield('title') | {{$gs->name}}">
	<meta itemprop="description" content="{{$gs->slogan}}">
	<meta itemprop="image" content="{{ URL::asset('assets/images/logo-lg.svg') }}">

	<!-- Facebook Meta Tags -->
	<meta property="og:url" content="https://assessmentpass.com">
	<meta property="og:type" content="website">
	<meta property="og:title" content=" @yield('title') | {{$gs->name}}">
	<meta property="og:description" content="{{$gs->slogan}}">
	<meta property="og:image" content="{{ URL::asset('assets/images/logo-lg.svg') }}">

	<!-- Twitter Meta Tags -->
	<meta name="twitter:card" content="summary_large_image">
	<meta name="twitter:title" content=" @yield('title') | {{$gs->name}}">
	<meta name="twitter:description" content="{{$gs->slogan}}">
	<meta name="twitter:image" content="{{ URL::asset('assets/images/logo-lg.svg') }}">
    
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ URL::asset('assets/images/favicon.ico') }}">
    {{-- <link rel="icon" type="image/x-icon" href="{{ asset('assets/images/' . $gs->favicon) }}" /> --}}
	<!-- Layout config Js -->
	<script src="{{ URL::asset('assets/js/layout.js') }}"></script>
	<!-- Bootstrap Css -->
	<link href="{{ URL::asset('assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
	   @yield('css')
	@stack('partial_css')
	<!-- Icons Css -->
	<link href="{{ URL::asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
	<!-- App Css-->
	<link href="{{ URL::asset('assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
	<!-- custom Css-->
	<link href="{{ URL::asset('assets/css/custom.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />


	<link href="{{ URL::asset('assets/front/custom.css') }}"  rel="stylesheet" type="text/css" />
	
	{{-- @yield('css') --}}

