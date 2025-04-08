@extends('user.layouts.master')
@section('title')
    @lang('translation.profile')
@endsection
@section('css')
<style type="text/css">
    .bg-grey{        
        background-color:#a9a9a9 !important;
    }
    .card-body-h-125{
        min-height:125px;
    }
</style>
@endsection
@section('content')

        <div class="row mt-4">
            <!-- Application Info Column -->
            <div class="col-md-4">
                <div class="card">
                     <div class="card-header bg-primary text-white">
                           Application Info
                        </div>
                    <div class="card-body card-body-h-125">
                       
                        
                        <p class="mb-1"><strong>Application Email:</strong> {{$userdata->email}}</p>
                        <p class="mb-1"><strong>Contact Number:</strong> {{$userdata->phone}}</p>
                        <p class="mb-1"><strong>Education Level:</strong> {{$userdata->internshipgraduate ? ucfirst($userdata->internshipgraduate) : 'nil'}}</p>
                       {{--  <div class="mt-3 d-flex flex-column align-items-end gap-2">
                            <button class="btn btn-outline-primary btn-block">Transcript</button>
                            <button class="btn btn-outline-primary btn-block">CV/Resume</button>
                            <button class="btn btn-outline-primary btn-block">Cover Letter</button>
                        </div> --}}
                    </div>
                </div>
            </div>

            <!-- Job Panel and Job Progress -->
            <div class="col-md-8">
                <!-- Job Panel -->
                <div class="card">
                  <div class="card-header bg-primary text-white">
                    Job Panel
                  </div>
                  <div class="card-body card-body-h-125">
                    <div class="row g-0 align-items-center">
                      <div class="col-md-3 text-center">
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0">
                                <img src="{!! Helpers::image($userdata->photo, 'user/avatar/', 'user.png') !!}" alt="" class="avatar-sm rounded">
                            </div>
                            <div class="flex-grow-1 ms-1">
                               <h6 class="fs-14 mb-1">{{ucfirst($userdata->name)}}</h6>
                               <p class="text-muted mb-0">Svip</p>
                            </div>
                        </div>
                      </div>
                      <div class="col-md-9">
                          <div class="row mt-2">
                           <div class="col">
                                <div class="text-center">
                                    <p class="card-text mb-2 fw-medium">JOBS APPLIED</p>
                                    <h3>{{ $jobstats['totalJobsInitiated'] }}/{{ $jobstats['totalJobsApplied'] }}</h3>
                                </div>
                            </div>
                            <div class="col">
                                <div class="text-center">
                                    <p class="card-text mb-2 fw-medium">TESTS COMPLETED</p>
                                    <h3>{{ $jobstats['totalStagesCompleted'] }}</h3>
                                </div>
                            </div>

                           {{--  <div class="col">
                                <div class="text-center">
                                  <p class="card-text mb-2 fw-medium">OFFERS GET</p>
                                  <h3>1</h3>
                                </div>
                            </div> --}}
                          </div>
                      </div>
                     
                    </div>
                  </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Job Progress</h5>
                        @php
                        $statusClasses = [
                            'Await' => 'bg-light text-black', // Grey
                            'Initiate' => 'bg-warning ', // Light Blue
                            'Pending' => 'bg-warning', // Dark Blue
                            'Pass' => 'bg-success', // Yellow
                            'Fail' => 'bg-danger' // Grey
                        ];
                        @endphp
                        
                        @if($jobApplications->count()>0)
                        @foreach ($jobApplications as $jobApplication)
                            <div class="mb-4 row">
                                <div class="col-md-3 d-flex flex-column justify-content-center">
                                    <strong>{{ $jobApplication->company->name }}</strong>
                                    <p>{{ $jobApplication->service_line }}, {{ $jobApplication->location }}</p>
                                </div>
                                <div class="col-md-9">
                                    <div class="row">
                                        @foreach ($jobApplication->stages as $stage)
                                            @php
                                                $bgClass = $statusClasses[$stage->status] ?? 'bg-secondary'; // Default to grey if status not set
                                            @endphp
                                            <div class="stage col mb-4 viewdata_in_canvas" style="cursor:pointer;" data-href="{{route('user.jobapplication.stage.show',['application_id'=>$jobApplication->id,'stage_id'=>$stage->id])}}">
                                                <div class="card mb-0 {{$stage->status=='Await'?'bg-grey':'bg-primary'}}  h-100"  >
                                                    <div class="position-absolute" style="top:2px;right:-3px">
                                                        <div class="badge {{ $bgClass }} fs-10">{{ $stage->status }}</div>
                                                    </div>
                                                    
                                                    <div class="card-body d-flex justify-content-center align-items-center">
                                                        <p class="text-white mb-0">{{ $stage->stage_name }}</p>
                                                    </div>
                                                </div>
                                                <small class="text-muted mt-1 d-flex justify-content-center">{{ $stage->last_date }}</small>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        @else

                            <div class="text-center">
                                <lord-icon class="avatar-xl" src="https://cdn.lordicon.com/etwtznjn.json" trigger="loop" colors="primary:#405189,secondary:#0ab39c"></lord-icon>
                                <h3 class="text-primary1 mb-4">No Jobs Applied Yet!</h3>
                               
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>


        <!-- Events Column (This should be outside and below the main .row element) -->
        <div class="row mt-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Latest Events</h5>
                        <div class="row row-cols-sm-2 row-cols-md-2 row-cols-lg-3" >
                            @foreach ($latestevents as $data)
                                @include('user.events.partials.event')
                            @endforeach
                        </div>
                        <div class="row mt-4">
                            <div class="col-md-12 text-center"> <!-- Add the 'text-center' class to center-align the content -->
                                <a class="btn btn-primary w-lg"  href="{{ route('user.events.index') }}">View All</a>
                            </div>
                        </div>

                        <!-- Events content will go here -->
                    </div>
                </div>
            </div>
        </div>


<div class="offcanvas offcanvas-end border-0" tabindex="-1" id="StageCanvasModal">
    <!--end offcanvas-header-->
    <div class="offcanvas-body profile-offcanvas p-0">
        <div class="team-cover ">
            <img src="{{ URL::asset('assets/images/small/img-9.jpg') }}" alt="" class="img-fluid" />
        </div>
        <div class="dynamic__content">
            
            
            {{-- @include('user.jobapplication.partials.stage') --}}
        </div>
            <div class="submit-loader" style="position: fixed;top: 50%;right: 15%;">
                <span class="spinner-border flex-shrink-0" role="status">
                    <span class="visually-hidden">Loading...</span>
                </span>
            </div>
    </div>
    <!--end offcanvas-body-->
</div>


@endsection
@section('script')

<script type="text/javascript">
// $(document).on('click','.viewdata_in_canvas',function(){
//       // $('#modal1').find('.modal-title').html('ADD NEW '+$('#headerdata').val());
//       $('.submit-loader').show();
//         $('#StageCanvasModal .dynamic__content').html('').load($(this).attr('data-href'),function(response, status, xhr){
//           if(status == "success")
//           {
//             $('.submit-loader').hide();
//           }

//         });
// });

$(document).on('click', '.viewdata_in_canvas', function () {
    var dataHref = $(this).data('href');
    // Perform an AJAX request to load the stage data
    $.ajax({
        url: dataHref,
        type: 'GET',
        dataType: 'json',
        success: function (response) {
            if (response.html) {
                $('.submit-loader').hide();
                // Update the content of the off-canvas with the loaded stage data
                $('#StageCanvasModal .dynamic__content').html(response.html);
                // Show the off-canvas
                $('#StageCanvasModal').offcanvas('show');
            }
        },
        error: function (xhr, status, error) {
            // Handle AJAX errors here
            toastr.error(error);
        }
    });
});


</script>
@endsection
