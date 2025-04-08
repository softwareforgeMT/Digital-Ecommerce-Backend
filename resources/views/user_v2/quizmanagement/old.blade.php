@extends('user.layouts.master')
@section('title')
    @lang('translation.home')
@endsection
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('assets/libs/shepherd.js/shepherd.js.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')


<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18"> Quiz Practice</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{route('user.dashboard')}}">Home</a></li>                 
                    <li class="breadcrumb-item active">Quiz Practice</li>
                    
                </ol>
            </div>

        </div>
    </div>
</div>

    <div class="ts-top-banner mb-4">
        <div class="row align-items-center">
            <div class=" col-lg-7 col-xxl-8 ">
                <h1 class="fw-semibold text-white">{{$banner->title}}</h1>
                <p class=" mb-3 mb-lg-4 fs-4 text-white ">
                    {{$banner->details}}
                </p>
                <div class="text-lg -end">
                    {{-- <button class="btn btn-primary px-4 fs-4">Buy Now</button> --}}
                    {{-- <button class="btn btn-primary px-4 ">Buy Now</button> --}}
                </div>
            </div>
            <div class="col-lg-5 col-xxl-4">

                <div class="ratio ratio-16x9 rounded">
                    <video width="320" height="240" class="video-element" poster="@isset($banner->file){!! Helpers::image($banner->file, 'banners/') !!}@endif" controls>
                       <source src="{!! Helpers::image($banner->video, 'banners/video/') !!}" type="video/mp4">
                       
                       Your browser does not support the video tag.
                    </video>
                </div>
            </div>
        </div>
    </div>

    <div class="card ts-filter-header rounded-0 mx-n4 mt-n4 border-top px-4 mb-5 py-4 bg-transparent">
        <form id="quizFilterForm" method="GET"
            action="{{ route('user.quiz.management.index', ['company_slug' => isset($company_slug) ? $company_slug : null]) }}">
            <div class="row align-items-end mb-3 px-2">
                <div class="col-xl-4 col-md-12 mb-4 mb-xl-0 px-1">
                    <div class="position-relative">
                        <button
                            class="btn p-0 ps-2 position-absolute-vertical-50 d-flex align-items-center justify-content-center">
                            <img width="24" src="{{ URL::asset('assets/images/search-lines.svg') }}" alt="...">
                        </button>
                        <input type="text" class="form-control w-100 ps-5 ts-rounded-06" id="ajaxSearch"
                            value="{{ $search }}" name="search" placeholder="Search...">
                    </div>
                </div>
                <div class="col-xl-2 col-md-3 mb-4 mb-md-0 px-1">
                    <div class="position-relative">
                        <select class="form-select ts-rounded-06 quiz_drop_filters"  name="quiz_position">
                            <option selected disabled value="">Position</option>
                            @foreach($uniq_positions  as $uniq_position)
                            <option value="{{$uniq_position}}" @if(request()->get('quiz_position') == $uniq_position) selected @endif>{{$uniq_position}}</option>
                            @endforeach
                            
                        </select>
                    </div>
                </div>
                <div class="col-xl-2 col-md-3 mb-4 mb-md-0 px-1">
                    <div class="position-relative">
                        <select class="form-select ts-rounded-06 quiz_drop_filters"  name="quiz_location">
                            <option selected disabled value="">Region</option>
                            @foreach($uniq_locations as $uniq_location)
                            <option value="{{$uniq_location}}"  @if(request()->get('quiz_location') == $uniq_location) selected @endif>{{$uniq_location}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                
                <div class="col-xl-2 col-md-3 mb-4 mb-md-0 px-1">
                    <div class="position-relative">
                        <select class="form-select ts-rounded-06 quiz_drop_filters" name="quiz_program">
                            <option selected disabled value="">Programme</option>
                            @foreach($uniq_quiz_programs as $quiz_program)
                            <option value="{{$quiz_program}}"  @if(request()->get('quiz_program') == $quiz_program) selected @endif>{{$quiz_program}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-xl-2 col-md-3 mb-4 mb-md-0 px-1">
                    <div class="position-relative">
                        <select class="form-select ts-rounded-06 quiz_drop_filters" name="min_membership">                       
                            <option selected disabled value="">
                            Min. Membership
                            {{-- Test Type --}}
                           </option>
                            @foreach($subplans as $subplan)
                             <option value="{{$subplan->name}}" @if(request()->get('quiz_assessment_type') == $subplan->name) selected @endif>{{$subplan->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

            </div>
        </form>
        <div class="">
            <a href="{{ route('user.quiz.management.index') }}" class="btn-default">Clear All</a>
        </div>
    </div>


    <div class="card">
        <div id="tsQuizTable" class="ts-quiz-table  ">
            <table class="rounded-3 overflow-hidden ">
                <thead>
                    <tr class="bg-primary text-white">
                        <th scope="col" colspan="2" class="text-center" style="width: 18%;" >Company</th>
                        <th scope="col" colspan="2">Position</th>
                        <th scope="col" colspan="2">Region</th>
                        <th scope="col" colspan="2">Test Stage</th>
                        <th scope="col" colspan="2">Programme</th>
                        <th scope="col" colspan="2">
                            Min. Membership
                            {{-- Test Type --}}
                        </th>
                        <th class="text-center" style="width: 17%;"  scope="col" colspan="2">Actions</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($quizmanagements as $data)
                        <tr>
                            <td data-label="Company" colspan="2">
                                <div class="d-flex align-items-center gap-2">
                                    <img height="37" src="{!! Helpers::image($data->company ? $data->company->logo : '', 'company/logo/') !!}" alt="...">
                                    <span>
                                        {{ $data->company ? $data->company->name : '' }}
                                    </span>
                                </div>
                            </td>

                            
                            <td colspan="2" data-label="Position">{{ $data->position }}</td>
                            <td colspan="2" data-label="Location">{{ $data->location }}</td>
                            <td colspan="2" data-label="Test Stage">{{ $data->assessment_stage }}</td>
                            <td colspan="2" data-label="Programme">{{ $data->program }}</td>

                            <td colspan="2" data-label="Min. Package">{{App\CentralLogics\UserAccess::findSuitablePlan($data->assessment_type)}}</td>
                            {{-- <td data-label="Actions" colspan="2"> --}}
                            <td colspan="2" data-label="Actions">
                                <div class="d-flex align-items-center  justify-content-end justify-content-xl-center gap-3">

                                    {{-- <div class="position-relative"> --}}
                                    <div class="fs-1 ts-heart-container-wrapper ">
                                        @include('includes.favorite', [
                                            'favdata' => $data,
                                            'type' => 'QuizBankManagement',
                                        ])
                                    </div>
                                    {{-- </div> --}}
                                    <a class="btn btn-primary"
                                        href="{{ route('user.quiz.management.show', $data->slug) }}">Free
                                        Trial</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>

    <div class="row g-0 text-center text-sm-start align-items-center mb-4">
        <div class="col-sm-6">
            <div>
                <p class="mb-sm-0">Showing {{ $quizmanagements->firstItem() }} to {{ $quizmanagements->lastItem() }} of
                    {{ $quizmanagements->total() }} entries</p>
            </div>
        </div> <!-- end col -->
        <div class="col-sm-6">
            {{ $quizmanagements->links('vendor.pagination.default') }}
        </div><!-- end col -->
    </div>
    <!-- end row -->

@php
$tourSteps = [
 
    'title' => 'Welcome Back!',
    'text' => 'You can practice with the latest assessment materials for your targeted employers.',
    'element' => '#tsQuizTable',
    'position' => 'top',
    'prev_button'=> route('user.company.index'),
    'next_button'=> route('user.mylearning.index'),
    'buttons' => [
      // Specify the buttons for this step
    ],
 
  // Add more steps as needed...
];
@endphp
@include('user.includes.tour', ['step' => $tourSteps])

@endsection




@section('script')
<script type="text/javascript">
     $(document).ready(function() {
        // Submit the form when the select dropdown is changed
        $('.quiz_drop_filters').on('change', function() {
            $('#quizFilterForm').submit();
        });
    });
</script>

@endsection


