@extends('user.layouts.master')
@section('title')
    @lang('translation.home')
@endsection
@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
  
@endsection
@section('content')

<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            
            <div class="d-flex align-items-center gap-3">                        
                <a href="{{ route('user.coaching.index') }}" class="btn btn-soft-primary float-start d-flex justify-content-center align-items-center p-1  ">
                    <i class=" ri-arrow-left-s-line lh-1 fs-4"></i>
                </a>
                <h4 class="mb-sm-0 font-size-18">Tutorial booking</h4>
            </div>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{route('user.dashboard')}}">Home</a></li> 
                    <li class="breadcrumb-item"><a href="{{ route('user.mylearning.index') }}">Learning</a></li> 

                    <li class="breadcrumb-item"><a href="{{ route('user.coaching.index') }}">Coaching</a></li>                      
                    <li class="breadcrumb-item active">Tutorial booking</li>
                    
                </ol>
            </div>

        </div>
    </div>
</div>


<div class="row">
    <div class="col-md-12">
         <div class="ts-top-banner appont_bg_banner1 mb-4">
                <div class="row  h-100">
                    <div class=" col-lg-5  ">
                        <div class="d-flex gap-3 mt-5 ms-3 mb-3">
                            @if ($data->intro_video)
                            <div class="">
                                <img src="{{ Helpers::image($data->photo, 'user/avatar/') }}" alt="user-img"
                                    class="img-thumbnail rounded-circle avatar-lg">
                            </div>
                            @endif
                           
                            <div>
                                <h3 class="mb-0 text-white mt-4 fs-30">{{ $data->name }}</h3>
                                @if ($data->language)
                                    <div class="d-flex align-items-center gap-2 mt-1 mb-2 fw-semibold text-white">
                                        <i class="bx bx-globe fs-4"></i>
                                        <p class=" mb-0">
                                            @php
                                             $language = $data->language ? json_decode($data->language, true) : null;
                                            $language = is_array($language) ? implode(', ', $language) : null;
                                            @endphp
                                            {{$language}}
                                        </p>
                                    </div>
                                @endif                                
                            </div>
                        </div>
                        
                    </div>

                   
                        <div class="col-lg-7 m-auto">
                            @if ($data->intro_video)
                            <div class="ratio ratio-16x9">
                                <video class="rounded-4" src="{{ Helpers::image($data->intro_video, 'user/intro_videos/') }}"
                                    controls></video>
                            </div>
                            @else
                            <div class="text-center">
                                <img class="rounded-4 top_b_image" src="{{ Helpers::image($data->photo, 'user/avatar/') }}">
                            </div>
                            @endif
                        </div>
                    
                    {{-- <div class="col-lg-5 col-xxl-4">
                        <div class="ratio ratio-16x9">
                            <iframe class="rounded" src="https://www.youtube.com/embed/Z-fV2lGKnnU" title="YouTube video"
                                allowfullscreen></iframe>
                        </div>
                    </div> --}}
                </div>
            </div>
    </div>
</div>

    <div class="row mb-5">
        <div class="col-xl-7">



            <div>

                {{-- <div class="card">
                    <div class="card-body "> --}}

                <ul class="ts-tab nav nav-pills  nav-justified apt-box-shadow11 mb-1" role="tablist">
                    @if($data->about)
                    <li class="nav-item waves-effect waves-light">
                        <a class="nav-link active" data-bs-toggle="tab" href="#about_me" role="tab">
                            <span>
                                About me
                            </span>
                        </a>
                    </li>
                    @endif

                    <li class="nav-item waves-effect waves-light">
                        <a class="nav-link {{!$data->about?'active':''}}" data-bs-toggle="tab" href="#my_appointment" role="tab">
                            <span>
                                My appointment
                            </span>
                        </a>
                    </li>
                    @if($data->coaching_services)
                    <li class="nav-item waves-effect waves-light">
                        <a class="nav-link" data-bs-toggle="tab" href="#coaching_service" role="tab">
                            <span>
                                Coaching service
                            </span>
                        </a>
                    </li>
                    @endif
                    @if($data->faqs)
                    <li class="nav-item waves-effect waves-light">
                        <a class="nav-link" data-bs-toggle="tab" href="#faqs" role="tab">
                            <span>
                                Faqs
                            </span>
                        </a>
                    </li>
                    @endif

                </ul>

                <div class="card apt-box-shadow1 fx-bg" style="background-image:url({{ asset('assets/images/subtract2.png') }});    background-position-x: center;">
                    <div class="card-body empty_card_body">
                        <div class="tab-content">
                            <div class="tab-pane active" id="about_me" role="tabpanel">
                                <p >{!! isset($data->about) ? $data->about : '' !!}</p>
                            </div>
                            <div class="tab-pane {{!$data->about?'active':''}}" id="my_appointment" role="tabpanel">
                                @php
                                    $myappointments = App\Models\Appointment::where('student_id', Auth::id())
                                        ->where('tutor_id', $data->id)
                                        ->latest()
                                        ->get();
                                @endphp
                                @if (count($myappointments) > 0)
                                    @foreach ($myappointments as $appointmentdata)
                                        <div class="card card-animate mt-2">
                                            <div class="card-body">
                                                <div class="d-flex justify-content-between">
                                                    <div>
                                                        <p class="fw-medium text-muted">Meeting Link:
                                                            <a target="_blank" href="{{ $appointmentdata->meeting_id }}" class="btn-default"> Click here</a> 
                                                            </p>
                                                        <div class="d-flex mb-2">
                                                            <div class="flex-grow-1 d-flex align-items-center">
                                                                <div class="flex-shrink-0 me-3">
                                                                    <i class="ri-calendar-event-line text-muted fs-16"></i>
                                                                </div>
                                                                <div class="flex-grow-1">
                                                                    <h6 class="d-block fw-semibold mb-0"
                                                                        id="event-start-date-tag">
                                                                        {{ isset($appointmentdata->start_date) ? \Carbon\Carbon::parse($appointmentdata->start_date)->format('d M, Y') : '' }}
                                                                    </h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex align-items-center mb-2">
                                                            <div class="flex-shrink-0 me-3">
                                                                <i class="ri-time-line text-muted fs-16"></i>
                                                            </div>
                                                            <div class="flex-grow-1">
                                                                <h6 class="d-block fw-semibold mb-0"><span
                                                                        id="event-timepicker1-tag">{{ isset($appointmentdata->start_time) ? \Carbon\Carbon::parse($appointmentdata->start_time)->format('h:i A') : null }}</span>
                                                                    - <span
                                                                        id="event-timepicker2-tag">{{ isset($appointmentdata->end_time) ? \Carbon\Carbon::parse($appointmentdata->end_time)->format('h:i A') : null }}</span>
                                                                </h6>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex mb-3">
                                                            <div class="flex-shrink-0 me-3">
                                                                <i class="ri-discuss-line text-muted fs-16"></i>
                                                            </div>
                                                            <div class="flex-grow-1">
                                                                <p class="d-block text-muted mb-0"
                                                                    id="event-description-tag">{!! isset($appointmentdata) ? $appointmentdata->details : null !!}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <div class="avatar-sm flex-shrink-0">
                                                            @if ($appointmentdata->status == 'pending')
                                                                <span
                                                                    class="avatar-title bg-soft-primary text-primary rounded-circle fs-4">
                                                                    <i class="mdi mdi-timer-sand"></i>
                                                                </span>
                                                            @else
                                                                <span
                                                                    class="avatar-title bg-soft-success text-success rounded-circle fs-4">
                                                                    <i class="ri-checkbox-circle-line"></i>
                                                                </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- end card body -->
                                        </div>
                                    @endforeach
                                @else
                                <div class="text-center mt-5">
                                    <lord-icon class="avatar-xl" src="https://cdn.lordicon.com/etwtznjn.json" trigger="loop" colors="primary:#405189,secondary:#0ab39c"></lord-icon>
                                    {{-- <h1 class="text-primary mb-4">Oops !</h1> --}}
                                    <h4 class="text-uppercase">No Appointments Yet!! </h4>
                                  
                                </div>
                                    
                                @endif

                            </div>
                            <div class="tab-pane" id="coaching_service" role="tabpanel">
                                <p>
                                    {!! isset($data->coaching_services) ? $data->coaching_services : '' !!}
                                </p>

                            </div>

                            {{-- <div class="tab-pane" id="resume" role="tabpanel">
                                <p>Resume</p>
                            </div> --}}
                            <div class="tab-pane" id="faqs" role="tabpanel">
                                <p>{!! isset($data->faqs) ? $data->faqs : '' !!}</p>
                            </div>

                        </div>
                    </div><!-- end card-body -->
                </div>
            </div>
        </div>
        <div class="col-xl-5">

            <div class="card mb-4 appintments">
                <div class="card-header mb-3 d-flex justify-content-between ">
                    <h4 class="card-title mb-0">Book Appointment</h4>


                    <a href="javascript:;" type="button" class="btn btn-sm btn-warning waves-effect text-white" data-bs-toggle="modal" data-bs-target="#appointmentScheduleDetails">View Schedule</a>

                </div><!-- end cardheader -->
                <div class="card-body mt-3">
                    <div class="upcoming-scheduled">
                        <input type="text" id="appointment_date" class="form-control" data-provider="flatpickr"
                            data-date-format="d M, Y" data-deafult-date="today" data-inline-date="true">
                    </div>
                </div><!-- end cardbody -->
            </div><!-- end card -->
            <!-- Outlined Styles -->
            <div id="appointment-slots">
                @include('user.learning.partials.slots')
            </div>
            <form id="appoinment-form" method="POST" action="{{ route('user.cart.addItem') }}">
                @csrf
                <input type="hidden" name="booking_time" id="booking_time" value="">
                <input type="hidden" name="booking_date" id="booking_time" value="">
                <input type="hidden" name="schedule_id" id="meeting_idd" value="">
                <input type="hidden" name="item_type" value="interview">
                <input type="hidden" name="item_id" value="{{ $data->id }}">
                <button type="submit" class="btn btn-warning waves-effect waves-light text-white  btn-lg w-100">
                    Book Appointment
                </button>
            </form>
        </div>
    </div>


<!-- Tutor schedule details Modal -->
<div id="appointmentScheduleDetails" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true"  style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Detailed Schedule</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
            </div>
            <div class="modal-body">
                    <table class="table table-nowrap">
                        <thead>
                            <tr>
                                <th scope="col">Days</th>
                                <th scope="col">Hours</th>
                                <th scope="col">Repeats</th>
                                {{-- <th scope="col">Action</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                          @php
                          $daysOfWeek = array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');
                          @endphp
                          @foreach ($daysOfWeek as $day)
                            @php
                                $dayNameLowercase = strtolower($day); 
                                $schedule = App\Models\Schedule::where('user_id', $data->id)->where('day_of_week',$dayNameLowercase)->first();
                            @endphp
                            <tr>
                                <th scope="row"><a href="#" class="fw-semibold">{{$day}}</a>

                                </th>
                                <td>

                                    @if($schedule)
                                      {{ \Carbon\Carbon::parse($schedule->start_time)->format('h:i A') }} - {{ \Carbon\Carbon::parse($schedule->end_time)->format('h:i A') }}

                                       <small class="d-block fw-semibold">{{ isset($schedule->start_date) ? \Carbon\Carbon::parse($schedule->start_date)->format('d M, Y')  : '' }} - {{ isset($schedule->end_date) ? \Carbon\Carbon::parse($schedule->end_date)->format('d M, Y')  : 'continue...' }}</small>
                                    @else
                                    Not Available
                                    @endif  
                                </td>
                                <td>{{ Helpers::getScheduleInterval($schedule->repeat_interval ?? null)}}</td>
                               
                            </tr>
                           @endforeach

                        </tbody>
                    </table>
            </div>
        </div>
    </div>
</div>
<!-- Tutor schedule details Modal ends -->

@endsection




@section('script')
    <script type='text/javascript' src="{{ URL::asset('assets/libs/flatpickr/flatpickr.min.js') }}"></script>
    {{-- <script src="{{ URL::asset('assets/js/pages/form-pickers.init.js') }}"></script> --}}
    <script type='text/javascript' src="{{ URL::asset('assets/js/seperateplugins.min.js') }}"></script>

    <script type="text/javascript">
        $(document).on('change', '#appointment_date', function() {
            var date = $(this).val();
            var tutor_id = {{ $data->id }};
            // var url = "{{ route('user.get.ScheduleForDate', ':date') }}".replace(':date', date);
            var url = "{{ route('user.get.ScheduleForDate') }}";
            $.ajax({
                url: url,
                type: 'GET',
                data: {
                    tutor_id: tutor_id,
                    date: date
                },
                dataType: 'html',
                success: function(data) {
                    $('#appointment-slots').html(data);
                },
                error: function(xhr, status, error) {
                    console.log(error);
                }
            });

        });
    </script>
    <script>
        $(document).ready(function() {
            // listen for click event on Checkout button
            $('#appoinment-form button[type=submit]').click(function(event) {
                event.preventDefault();
                var selectedTime = $('input[name=tutorial-booking]:checked').val();
                var selectedDate = $('#appointment_date').val();
                var scheduleId = $('#scheduleeid').val();


                if (!selectedTime) {
                    alert('Please select a time slot before checking out.');
                    return;
                }
                $('input[name=booking_date]').val(selectedDate);
                $('input[name=booking_time]').val(selectedTime);
                $('input[name=schedule_id]').val(scheduleId);
                // submit the form
                $('#appoinment-form').submit();
            });
        });
    </script>
    <script>
    $(document).ready(function() {
        // Get the fragment identifier from the URL
        var hash = window.location.hash;       
        // If the hash exists and matches a tab link, activate the corresponding tab
        if (hash) {
            $('a[data-bs-toggle="tab"][href="' + hash + '"]').tab('show');
        }
    });
</script>

@endsection
