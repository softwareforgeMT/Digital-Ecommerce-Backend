@extends('front.layouts.app')
@section('title') {{$page->title}}  @endsection
 
@section('css')
 <style type="text/css">
     .shape {
            position: absolute;
            bottom: 0;
            right: 0;
            left: 0;
            z-index: 1;
            pointer-events: none;
        }
        .shape>svg {
            width: 100%;
/*            height: auto;*/
            fill: #f3f3f9;
        }
        .apt-box-shadow1{
            box-shadow: 0px 4px 10px -4px rgb(22 65 109 / 50%) !important;

        /*  box-shadow: 0px 0px 10px rgb(22 65 109 / 50%); ;*/
        }
        img{
            width:100%;
        }
 </style>
@endsection
@section('content')

           
    <section class="section page__content mt-5">
            <div class="container">
                @if(in_array($page->id, ['2', '3']))
                <div class="row justify-content-center ">
                    <div class="col-lg-10">
                        <div class="card apt-box-shadow1">
                            <div class="apt-bg-primary position-relative">
                                <div class="card-body p-5">
                                    <div class="text-center ">
                                        <h3 class="text-white"> {!! $page->title !!}</h3>
                                        <p class="mb-0 text-white">Last update: {{ \Carbon\Carbon::parse($page->updated_at)->format('F d, Y') }}</p>
                                    </div>
                                </div>
                                <div class="shape">
                                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="1440" height="60" preserveAspectRatio="none" viewBox="0 0 1440 60">
                                        <g mask="url(&quot;#SvgjsMask1001&quot;)" fill="none">
                                            <path d="M 0,4 C 144,13 432,48 720,49 C 1008,50 1296,17 1440,9L1440 60L0 60z" style="fill: var(--vz-card-bg-custom);"></path>
                                        </g>
                                        <defs>
                                            <mask id="SvgjsMask1001">
                                                <rect width="1440" height="60" fill="#ffffff"></rect>
                                            </mask>
                                        </defs>
                                    </svg>
                                </div>
                            </div>
                            <div class="card-body p-4">
                                <div>
                                    {!! $page->details !!}
                                </div>
                            </div>
                        </div>
                    </div><!--end col-->
                </div>    
                @elseif($page->id==1)
               {{--  <h1 class="mb-3">About</h1>
                <div class="row align-items-center">
                    <div class="col-md-4">
                         <div>
                             <img class="img-fluid img-thumbnail" src="{{asset('/images/nina.png')}}">
                         </div>
                    </div>
                    <div class="col-md-4">
                        <h3>{{$gs->name}}</h3>
                        <p>At {{$gs->name}} we believe in accessibility. Any business owner of any linguistic background or ability should be able to reach advertising spaces. We aim to empower and help facilitate the advertising process.</p>
                    </div>
                    <div class="col-md-4">
                        <h3>The Founder</h3>
                        <p>
                            Boricua<br>
                            Veteran<br>
                            Mom of 3 boys<br>

                            PhD student - Seattle Pacific University<br>
                            MEd graduate - University of Alaska<br>
                            BS graduate - New York University<br>
                        </p>
                    </div>
                </div> --}}
                @else
                <div class="row justify-content-center ">
                     {{-- <div>
                       <h3>{!! $page->title !!}</h3> 
                    </div> --}}
                    <div>
                        {!! $page->details !!}
                    </div>
                </div>
                @endif                           
            </div><!--end col-->
    </section>

@endsection