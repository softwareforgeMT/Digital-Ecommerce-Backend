<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>{{$gs->name}}</title>
<meta name="csrf-token" content="{{ csrf_token() }}">
<!-- ** [ BOOTSTRAP CSS STYLE FILLE LINK ] ** -->
{{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" /> --}}
<!-- ** [ BOOTSTRAP ICON FILLE LINK ] ** -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />

<!-- ** [ COMMON CSS STYLE FILLE LINK ] ** -->
<link rel="stylesheet" href="{{ asset('assets/css/front/common.css') }}" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet" />
<style>
    .fl-message{
        color:white;
    }
</style>
<!-- ** [ COLOR CSS STYLE FILLE LINK ] ** -->
@include('layouts.head-css')
@yield('css')
<!-- ** [ FONT AWESOME ICON FILLE LINK ] ** -->
<script src="https://kit.fontawesome.com/dc80c8265b.js" crossorigin="anonymous"></script>
