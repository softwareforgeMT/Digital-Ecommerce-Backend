@extends('user.layouts.master')
@section('title')
    @lang('translation.home')
@endsection
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')


<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18"> Quiz Practice</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{route('user.dashboard')}}">Home</a></li> 
                     <li class="breadcrumb-item"><a href="{{ route('user.quiz.management.index') }}">Quiz Practice</a></li>                  
                    <li class="breadcrumb-item active"> Quiz Bank</li>
                    
                </ol>
            </div>

        </div>
    </div>
</div>

    {{-- <div class="row"> --}}
    <div class="card rounded-0   border-top ts-rounded-12">
        <div>
            <div class="row align-items-center  px-3 py-4">
                <div class=" col-lg-7 col-xxl-8 text-white mb-4 mb-lg-0 ">
                    <div class="d-flex align-items-center gap-3">
                        
                            <a href="{{ route('user.quiz.management.index') }}"
                                class="btn btn-soft-info float-start d-flex justify-content-center align-items-center px-2 ">
                                <i class=" ri-arrow-left-s-line lh-1 fs-2"></i>
                            </a>
                       
                        <h3 class="fw-semibold text-black mb-0">{{ $quizbankmanagement->name }} {{-- -
                            {{ $quizbankmanagement->position }}({{ $quizbankmanagement->program }}) -
                            {{ $quizbankmanagement->assessment_type }} --}}
                        </h3>
                    </div>
                    <div class="fs-5 text-dark">

                        <p class="mb-3 mb-lg-4 " >
                            {!! isset($quizbankmanagement->details) ? $quizbankmanagement->details : '' !!}
                        </p>
                    </div>
                    <ul class="list-unstyled fs-4 ts-text-gray-900 ">
                        {{-- <li>MQuiz Price: {{ Helpers::setCurrency($quizbankmanagement->price) }}</li> --}}
                        <li>Updated Date: {{ $quizbankmanagement->updated_at->format('d F Y') }}</li>
                    </ul>
                   
                    <div class="">
                        @if($UserAccess)
                        <button  class="btn btn-primary ts-rounded-06 px-4 disabled">Activated</button>
                        @elseif($canAccess)
                        <button type="button"  class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#oneModalAllow">Activate Now</button>
                        @else

                        {{-- <a href="{{ route('user.quiz.management.show', ['quiz_management_slug' => $quizbankmanagement->slug, 'activate' =>  1]) }}" class="btn btn-warning  ts-rounded-06 px-4">Upgrade Now</a> --}}

                            @if($alreadOpenedPosition)
                             <div class="row">
                                    <div class="col-lg-12">
                                         <p class="text-dark d-block"><strong> You've got one position active. Additional quizzes must be purchased separately/individually.</strong></p>
                                    </div>
                                </div>
                            @else
                                <div class="text-dark">
                                    <p class="mb-0"><strong>Your Choice, Your Way:</strong></p>
                                    <ul>
                                      <li>
                                        <strong>Upgrade Now:</strong> Explore subscription plans for comprehensive quiz access.
                                      </li>
                                      <li>
                                        <strong>Add to Cart:</strong> Buy this quiz solo to curate your learning experience.
                                      </li>
                                    </ul>
                                </div>                  
                            @endif
                            <div class="d-flex justify-content-start align-items-center gap-3 fw-medium">
                                @if($alreadOpenedPosition)
                                @else
                                <a href="{{ route('user.pricing') }}" class="btn btn-warning  ts-rounded-06 px-4">Upgrade Now</a>
                                <span class="fs-4 text-primary">or</span>  
                                @endif

                                                 
                                <form method="POST" action="{{ route('user.cart.addItem') }}">
                                    @csrf
                                    <input type="hidden" name="item_type" value="quizbank">
                                    <input type="hidden" name="item_id" value="{{ $quizbankmanagement->id }}">
                                    <button 
                                        style="min-width:160px" 
                                        type="submit" 
                                        class="btn btn-primary px-4 ts-rounded-06" 
                                        onmouseover="this.innerHTML='{{ Helpers::setCurrency($quizbankmanagement->price) }}';" 
                                        onmouseout="this.innerHTML='Add to Cart';"
                                    >
                                       Add to Cart
                                    </button>
                                </form> 
                            </div>

                        @endif
                    </div>
                </div>
                <div class="col-lg-5 col-xxl-4">
                    <div class="ratio ratio-16x9">
                        @if ($quizbankmanagement->intro_video)
                            <video class="rounded" controls>
                                <source src="{{ Helpers::image($quizbankmanagement->intro_video, 'quiz/intro_videos/') }}"
                                    type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <!-- end card body -->
    </div>
    {{-- </div> --}}



    @foreach ($quizGroups as $quizGroup => $quizzes)
        <div class="card p-3  mb-4 shadow-lg mb-4 py-4 ts-rounded-12">
            <h4 class="fw-semibold text-uppercase  mb-3">{{ $quizGroup }}</h4>
            <div class="d-flex flex-wrap justify-content-center justify-content-sm-start  gap-2 gap-sm-3">
                @foreach ($quizzes as $key => $quiz)
                    <div class="ts-quiz__item  ts-shadow-quiz-item d-flex align-items-center position-relative   rounded-3">
                        @if (App\Models\QuizProgress::where('user_id', auth()->user()->id)->where('quiz_id', $quiz->id)->where('is_read', true)->exists())
                            <span class="badge badge-pill bg-success position-absolute top-0 rounded-0" style="padding: 2px"
                                data-key="t-new">Read</span>
                        @endif
                        <div class="p-3 py-2">
                            <h5 class=" fw-bold mb-0">
                                
                                 {{ Helpers::quizName($quiz->slug) }}
                            </h5>
                        </div>
                        {{-- @if ($key == 0 || $UserAccess || $quizbankmanagement->price <= 0) --}}
                        @if ($key == 0 || $UserAccess )
                            <a class="px-2"
                                href="{{ route('user.quiz.test.show', [$quizbankmanagement->slug, $quiz->slug]) }}">
                                <img width="22" src="{{ URL::asset('assets/images/svg/circle-yellow-play.svg') }}"
                                    alt="circle yellow play">
                            </a>
                        @elseif($canAccess)
                            <a class="px-2" href="javascript:;"  data-bs-toggle="modal" data-bs-target="#oneModalAllow">
                                <img width="22" src="{{ URL::asset('assets/images/svg/circle-gray-lock.svg') }}"
                                    alt="circle yellow play">
                            </a>
                        @else 
                            <a class="px-2" href="{{ route('user.quiz.management.show', ['quiz_management_slug' => $quizbankmanagement->slug, 'activate' => 1]) }}">
                                <img width="22" src="{{ URL::asset('assets/images/svg/circle-gray-lock.svg') }}"
                                    alt="circle yellow play">
                            </a>   
                        @endif

                    </div>
                @endforeach
            </div>
        </div>
    @endforeach





    <!-- Activate Position modal -->
    <div class="modal fade" id="oneModalAllow" aria-hidden="true" aria-labelledby="..." tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center p-3">
                   <lord-icon src="https://cdn.lordicon.com/tdrtiskw.json" trigger="loop"
                        colors="primary:#f7b84b,secondary:#405189" style="width:130px;height:130px">
                    </lord-icon>
                    <div class="{{-- mt-4 pt-4 --}}">
                        <h4 class="text-center">Warning !!</h4>
                        <p class="text-muted">
                            If you have accessed "{{ $quizbankmanagement->position }}" in "{{ $quizbankmanagement->company?$quizbankmanagement->company->name:'' }}", you WON'T be allowed to access other positions in "{{ $quizbankmanagement->company?$quizbankmanagement->company->name:'' }}". (It WON'T  affect your access to other employers.)
                            {{-- If you have accessed Audit in PwC, you will not be allowed to access other positions in PwC.  It does NOT affect you access other employer companies --}}

                            {{-- Please be notified that only one position in <span class="text-warning"> each employer (Company)
                            </span>
                            is accessible. --}}
                        </p>
                        {{-- <p class="text-muted mb-3">
                            Once this quizbank for this position is activated , it is not allowed to activate the access to other positions in the SAME employer.
                        </p> --}}
                        <!-- Toogle to second dialog -->
                        <div class="col-lg-12">
                            <div class="hstack gap-2 justify-content-end">
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                <a href="{{ route('user.quiz.management.show', ['quiz_management_slug' => $quizbankmanagement->slug, 'activate' => 1]) }}" class="btn btn-success">
                                    Activate
                                </a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <!-- Only One Position Allow modal -->
    <div class="modal fade" id="alreadyOpenedPositionModal" aria-hidden="true" aria-labelledby="..." tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center p-3">
                   <lord-icon src="https://cdn.lordicon.com/tdrtiskw.json" trigger="loop"
                        colors="primary:#f7b84b,secondary:#405189" style="width:130px;height:130px">
                    </lord-icon>
                    <div class="{{-- mt-4 pt-4 --}}">
                        <h4 class="text-center">Warning !!</h4>
                        <p class="text-muted">
                             
                           Sorry, you have already accessed one position in "{{ $quizbankmanagement->company?$quizbankmanagement->company->name:'' }}", you are not allowed to activate "{{ $quizbankmanagement->position }}" in "{{ $quizbankmanagement->company?$quizbankmanagement->company->name:'' }}"
                        </p>
                        <!-- Toogle to second dialog -->
                        <div class="col-lg-12">
                            <div class="hstack gap-2 justify-content-end">
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

   


@endsection



@section('script')
 <!-- JavaScript to trigger the modal on page load -->
<script type="text/javascript">
    $(document).ready(function() {     
        @if(Session::has('already_opened_position'))
        $('#alreadyOpenedPositionModal').modal('show');
        @endif
    });
</script>

@endsection
