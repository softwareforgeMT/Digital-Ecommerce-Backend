@extends('user.layouts.master')
@section('title')
    @lang('translation.home')
@endsection
@section('css')

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('assets/libs/shepherd.js/shepherd.js.min.css') }}" rel="stylesheet" type="text/css" />

    <!--datatable css-->
    <link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')


<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            
            <div class="d-flex align-items-center gap-3">
                @if($company_slug)                        
                <a href="{{ route('user.company.show',$company_slug) }}" class="btn btn-soft-primary float-start d-flex justify-content-center align-items-center p-1  ">
                    <i class=" ri-arrow-left-s-line lh-1 fs-4"></i>
                </a>
                @endif
                <h4 class="mb-sm-0 font-size-18"> Job Listings</h4>
            </div>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{route('user.dashboard')}}">Home</a></li>                 
                    <li class="breadcrumb-item active">Job Listings</li>
                    
                </ol>
            </div>

        </div>
    </div>
</div>

    {{-- <div class="ts-top-banner mb-4">
        <div class="row align-items-center">
            <div class=" col-lg-7 col-xxl-8 ">
                <h1 class="fw-semibold text-white">{{$banner->title}}</h1>
                <p class=" mb-3 mb-lg-4 fs-4 text-white ">
                    {{$banner->details}}
                </p>
            </div>
            <div class="col-lg-5 col-xxl-4">
                <div class="ratio ratio-16x9 rounded">
                    <video controls>
                        <source src="{!! Helpers::image($banner->video, 'banners/video/') !!}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </div>
            </div>
        </div>
    </div> --}}

    <div class="">

            <div class="row align-items-end mb-3 px-2">
                <div class="col-xl-4 col-md-12 mb-4 mb-xl-0 px-1">
                    <div class="position-relative">
                        <button
                            class="btn p-0 ps-2 position-absolute-vertical-50 d-flex align-items-center justify-content-center">
                            <img width="24" src="{{ URL::asset('assets/images/search-lines.svg') }}" alt="...">
                        </button>
                        <input type="text" class="form-control w-100 ps-5 ts-rounded-06 job_input_filters" id="ajaxSearch"
                            value="" name="search" data-column="column-3" placeholder="Search...">
                    </div>
                </div>
               
                
                
                <div class="col-xl-2 col-md-3 mb-4 mb-md-0 px-1">
                    <div class="position-relative">
                        <select class="form-select ts-rounded-06 job_drop_filters" name="job_program" data-column="column-4">
                            <option selected value="">All Programms</option>
                            @foreach($uniq_programs as $job_program)
                            <option value="{{$job_program}}"  @if(request()->get('job_program') == $job_program) selected @endif>{{$job_program}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-xl-2 col-md-3 mb-4 mb-md-0 px-1">
                    <div class="position-relative">
                        <select class="form-select ts-rounded-06 job_drop_filters"  name="job_location"  data-column="column-5">
                            <option selected  value="">All Regions</option>
                            @foreach($uniq_locations as $uniq_location)
                            <option value="{{$uniq_location}}"  @if(request()->get('job_location') == $uniq_location) selected @endif>{{$uniq_location}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            @php
            $response=App\CentralLogics\UserAccess::hasAccess(auth()->user(),'job_applications',27387283);
            $UserAccess=$response['access']?true:false;
            @endphp
            @if($UserAccess)
                <div class="col-xl-2 col-md-3 mb-4 mb-md-0 px-1 ml-auto">
                       <a class="btn btn-primary" href="{{ route('user.jobapplication.index') }}">View Jobs Applied</a>
                </div>
            </div>
            @endif

        <div class="">
            <a href="{{ route('user.joblisting.index') }}" class="btn-default">Clear All</a>
        </div>
    </div>


    <div class="mb-4" id="JobListings">
        <div id="tsQuizTable" class="ts-quiz-table">
            <table id="geniustable" class="rounded-3 overflow-hidden " style="border:none" >
                <thead>
                    <tr class="bg-primary text-white">
                        <th id="column-1" class="text-start" style="min-width: 12%;">Company</th>
                        <th id="column-2">Service Line</th>
                        <th id="column-3">Position</th>
                        <th id="column-4">Program</th>
                        <th id="column-5">Location</th>
                        <th id="column-6">Posted on</th>
                        <th id="column-7">Last Date</th>
                        <th class="text-center" >Actions</th>
                    </tr>
                </thead>
                <tbody class="card-body1">
                    
                </tbody>
                
            </table>
        </div>
    </div>


@php
$tourSteps = [
 
    'title' => 'Welcome Back!',
    'text' => 'Explore the latest job listings for your targeted employers.',
    'element' => '#tsQuizTable',
    'position' => 'top',
    'prev_button' => route('user.company.index'),
    'next_button' => route('user.quiz.management.index'),
    'buttons' => [
      // Specify the buttons for this step
    ],
 
  // Add more steps as needed...
];
@endphp
@include('user.includes.tour', ['step' => $tourSteps])

@endsection




@section('script')

 <script src="{{ asset('assets/common_assets/js/favorite.js') }}"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>

{{-- DATA TABLE --}}

    <script type="text/javascript">
        var url='{!! route('user.joblisting.index.datatables',compact('company_slug')) !!}';
        var table = $('#geniustable').DataTable({
               ordering: false,
               processing: true,
               serverSide: true,
                bLengthChange: false,
                // bFilter:false,
               ajax: url,
               columns: [
                        
                        { data: 'company_id', name: 'company_id'},
                        { data: 'service_line', name: 'service_line'},
                        { data: 'title', name: 'title'},
                        { data: 'program', name: 'program'},
                        
                        { data: 'location', name: 'location'},
                        { data: 'created_at', name: 'created_at'},
                        { data: 'last_date', name: 'last_date'},
                        { data: 'action', searchable: false, orderable: false }
                     ],
                
                 language: {
                        search: '', // Empty string to hide the search bar
                        lengthMenu: '_MENU_', // Show "Show [x] entries" as an underscore (you can customize this text)
                    },
            });
            {{-- DATA TABLE ENDS--}}

            $(document).ready(function () {

                $('.job_drop_filters').change( function() {
                    console.log($(this).val(),$(this).attr('data-column'));
                  table.column('#'+$(this).attr('data-column')).search( $(this).val() ).draw();
                } );

                // Function to search in all columns
                function globalSearch() {
                    var searchText = $('.job_input_filters').val();
                    table.search(searchText).draw();
                }

                // Bind the global search function to keyup event of the input
                $('.job_input_filters').on('keyup', function () {
                    globalSearch();
                });
            });
    </script>

@endsection
