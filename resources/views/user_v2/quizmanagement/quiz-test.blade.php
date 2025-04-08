@extends('user.layouts.master')
@section('title')
    @lang('translation.home')
@endsection
@section('css')
    <link href="{{ URL::asset('assets/libs/swiper/swiper.min.css') }}" rel="stylesheet" type="text/css" />
    <style type="text/css">
       /* Styles for the sticky sidebar */
        .sidebar {
          width: 100%; /* Take the full width of the parent container */
        }
        
       /* Styles for the sticky behavior on screens larger than col-md */
        @media (min-width: 768px) {
          .sidebar-wrapper--sticky {
            position: fixed;
            top: 20px; /* Adjust the distance from the top of the viewport as needed */
          }
          .footer__reached{
            top: unset;
            bottom:70px;
          }
        }
    </style>
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
                     <li class="breadcrumb-item"><a href=" {{ route('user.quiz.management.show', $quizbankmanagement->slug) }}">Quiz Bank</a></li>                             
                    <li class="breadcrumb-item active">{{ $quiz->quiz_group }}</li>
                    
                </ol>
            </div>

        </div>
    </div>
</div>

    <div class="row" id="dynamic-quiz-data" >

        @if($quiz->question_type==='Pdf-based')
            @include('user.quizmanagement.partials.pdfBased.pdfbased')
        @else
            @include('user.quizmanagement.partials.quiz-detail')
        @endif
        

        

    </div>

    @include('includes.modals.report-modal')



    
    <!-- Activate Position modal -->
    @if(Session::has('can_access') || isset($UserAccess) )
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
                            
                          {{--   Please be notified that only one position in <span class="text-warning"> each employer (Company)
                            </span>
                            is accessible. --}}
                        </p>
                       
                        <div class="col-lg-12">
                            <div class="hstack gap-2 justify-content-end">
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                @if ($nextQuiz)
                                <a href="{{ route('user.quiz.test.show', [$quizbankmanagement->slug, $nextQuiz->slug,'activate' => 1]) }}" class="btn btn-success">
                                    Activate
                                </a>
                                @else
                                    <a href="{{ route('user.quiz.test.show', [$quizbankmanagement->slug, $quiz->slug,'activate' => 1]) }}" class="btn btn-success">
                                    Activate
                                   </a>

                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
    
    <!-- Only One Position Allow modal -->
    @if(Session::has('already_opened_position') || isset($canAccess) )
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
                            {{-- You have already Opened One position  --}}
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
    @endif



@endsection



@section('script')

<script type="text/javascript">
$(document).ready(function() {
    var sidebar = $('#stickySidebar');
    var offsetTop = sidebar.offset().top;
    var sidebarHeight = sidebar.outerHeight();
    var buffer = 50;  // 50px threshold before it toggles back

    $(window).scroll(function() {
        if ($(window).width() >= 768) {
            var scrollTop = $(window).scrollTop();
            var windowHt = $(window).height();
            var footerHt = $('#user_dashboard_footer').height();  // Assuming you have a footer
            var bottomSpace = 30; // Add the space you want from the bottom here

            var parentWidth = sidebar.parent().outerWidth();

            sidebar.width(parentWidth);

            if (scrollTop + windowHt >= $(document).height() - footerHt - bottomSpace) {
                var newBottomPos = (scrollTop + windowHt - $(document).height() + footerHt + bottomSpace);
                sidebar.addClass('footer__reached');
                console.log("reached");
                //sidebar.css('bottom', newBottomPos + 'px');
            } else {
                //sidebar.css('bottom', '');
                sidebar.removeClass('footer__reached');
            }

            if (scrollTop > offsetTop) {
                sidebar.addClass('sidebar-wrapper--sticky');
            } else {
                sidebar.removeClass('sidebar-wrapper--sticky');
            }
        }
    });


    //Display modal to activate quiz
    @if(Session::has('already_opened_position'))
    $('#alreadyOpenedPositionModal').modal('show');
    @elseif(Session::has('can_access'))
    $('#oneModalAllow').modal('show');
    @endif
    //Display modal to activate quiz ends


    // $(window).scroll(function() {
    //     if ($(window).width() >= 768) {
    //         var scrollTop = $(window).scrollTop();

    //         // Calculate the width of the parent container
    //         var parentWidth = sidebar.parent().outerWidth();

    //         // Set the width of the sidebar to the parent container's width
    //         sidebar.width(parentWidth);

    //         // Add/remove 'sticky' class based on scroll position
    //         if (scrollTop > offsetTop + buffer) {
    //             sidebar.addClass('sidebar-wrapper--sticky');
    //             sidebar.parent().height(sidebarHeight); // Reserve space
    //         } else if (scrollTop < offsetTop) {
    //             sidebar.removeClass('sidebar-wrapper--sticky');
    //             sidebar.parent().height('auto');
    //         }
    //     }
    // });
});

</script>   

<script>
    // Disable right-click on the page
    // document.addEventListener('contextmenu', function(e) {
    //     e.preventDefault();
    // });
    // Detect and prevent the Print Screen key press event
    // document.addEventListener('keydown', function(e) {
    //      // e.preventDefault();
    //     if (e.key === 'PrintScreen') {
    //         // e.preventDefault();
    //     }
    //     if (event.keyCode === 46) { // The keyCode for the PrintScreen key
    //         //disableScreenshot();
    //       }

    //       if (event.keyCode === 44 || (event.altKey && event.keyCode === 44)) {
    //         // Screenshot attempt detected, take appropriate action
    //       }
    // });
    // document.addEventListener('touchstart', function(event) {
    //      e.preventDefault();
    //      alert(34);
    //   // Screenshot attempt detected, display a warning message
    // });

    // function disableScreenshot() {
    //   var element = document.getElementById("screenshotElement");
    //   element.style.opacity = 0;
    // }


    // window.onbeforeprint = function(e) {
    //     // Display a custom message or prevent the print dialog
    //     // For example:
    //     alert('Printing is not allowed.');
    //     return false;
    // };
</script>




@endsection
