<div class="col-xl-8 col-md-8 order-1 order-md-0" style="min-height:650px">

    <div class="card ts-rounded-12 overflow-hidden">

        <div class="card-header border-0  w-100  ">

            <a href="{{ route('user.quiz.management.show', $quizbankmanagement->slug) }}"
                class="btn btn-soft-primary float-start d-flex justify-content-center align-items-center p-0  ">
                <i class=" ri-arrow-left-s-line lh-1 fs-4"></i>
            </a>
            <h4 class="fw-semibold text-center mb-0">
                {{ $quiz->title }}
                {{-- {{ $quiz->quiz_group }} --}}
            </h4>
        </div><!-- end card header -->
    </div>
    

    @if($quiz->question_type == 'Game-based' && !empty($quiz->game_id))
        @if(view()->exists('user.gamebased.' . $quiz->game_id . '.index'))
            @include('user.gamebased.' . $quiz->game_id . '.index')
        @else
            <!-- Handle the case where the view does not exist, maybe show a default message or view -->
            <p>Game view not available.</p>
        @endif

    @else
        @if ($quiz->gallery || $quiz->question_type == 'Self-Recorded')
            <div class="card ts-rounded-12 overflow-hidden">
                <div class="card-body">

                    <!-- Swiper -->
                    @if ($quiz->gallery)
                        <div
                            class="swiper {{ count(json_decode($quiz->gallery)) > 1 ? 'navigation-swiper' : '' }} rounded mb-4">
                            <div class="swiper-wrapper">
                                @foreach (json_decode($quiz->gallery) as $key => $gallery)
                                    @php
                                        $path = $gallery;
                                        
                                        $extension = pathinfo($path, PATHINFO_EXTENSION);
                                        $allowedVideoFormats = explode('|', config('fileformats.video'));
                                        $isVideo = in_array($extension, $allowedVideoFormats);
                                        $src = Helpers::image($path, 'quiz/gallery/');
                                    @endphp
                                    <div class="swiper-slide">
                                        @if ($isVideo)
                                            <video class="rounded" controls width="100%" height="400">
                                                <source src="{{ $src }}" type="video/mp4">
                                                Your browser does not support the video tag.
                                            </video>
                                        @else
                                            <img src="{{ $src }}" alt="" class="img-fluid w-100" />
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                            @if (count(json_decode($quiz->gallery)) > 1)
                                <div class="swiper-button-next"></div>
                                <div class="swiper-button-prev"></div>
                                <div class="swiper-pagination"></div>
                            @endif
                        </div>
                    @endif


                    @if ($quiz->question_type == 'Self-Recorded')
                        <button class="btn btn-soft-info btn-sm" id="startNowButton">Start Now</button>
                        <div class="row">

                            <div class="col-md-6 mx-auto mb-2">
                                <div class="ts-record-video text-center">
                                    @include('user.quizmanagement.partials.video', [
                                        'response_time' => $quiz->response_time ? $quiz->response_time : '120',
                                         'prepare_time' => $quiz->prepare_time ? $quiz->prepare_time : '120',
                                    ])
                                </div>
                            </div>

                        </div>
                    @endif


                </div><!-- end card-body -->
            </div><!-- end card -->
        @endif

        <div class="card ts-rounded-12 overflow-hidden">
            <div class="card-body ">
                <div class="ts-question">
                    <h3 class="mb-0">{!! isset($quiz->details) ? $quiz->details : '' !!}</h3>
                </div>
            </div>
        </div>
        @if ($quiz->options)
            @php
                $letters = range('A', 'Z'); // Generate an array of letters from A to Z
                $optionCount = count(json_decode($quiz->options));
            @endphp
            @foreach (json_decode($quiz->options) as $key => $option)
                <div class="card d-flex flex-row ts-rounded-12 overflow-hidden">
                    <div class="card-body ">
                        <div class="ts-question">
                            <div class="ts-answer ">
                                @if ($optionCount > 1)
                                    <div>
                                        <h3
                                            class="ts-3 ts-answer__number border border-1 border-primary d-flex justify-content-center align-items-center ts-rounded-12 mb-0">
                                            {{ $letters[$key] }}</h3>
                                    </div>
                                @endif

                                <div>
                                    {{ $option }}
                                </div>
                            </div>

                        </div>
                    </div>

                    <div
                        class="ts-answer-view-more bg-primary text-white d-flex justify-content-center align-items-center px-2">
                        <i class="fs-2 mdi mdi-dots-vertical"></i>

                    </div>
                </div>
            @endforeach
        @endif
    @endif

    <div class="d-flex flex-wrap {{ $previousQuiz ? 'justify-content-between' : 'justify-content-end' }} gap-4 p-3">

        @if ($previousQuiz)
            <a class="btn btn-primary quiz-render-button"
                href="{{ route('user.quiz.test.show', ['quiz_management_slug' => $quizbankmanagement->slug, 'quiz_slug' => $previousQuiz->slug, 'query' => $query]) }}">Show
                Previous</a>
        @endif

        @if ($nextQuiz)
            <a class="btn btn-primary quiz-render-button"
                href="{{ route('user.quiz.test.show', ['quiz_management_slug' => $quizbankmanagement->slug, 'quiz_slug' => $nextQuiz->slug, 'query' => $query]) }}">Show
                Next</a>
        @else
            <a class="btn btn-primary quiz-comleted-button"
                data-href="{{ route('user.quiz.test.completed', [$quizbankmanagement->slug, $quiz->slug]) }}">Finish</a>
        @endif
    </div>




</div>
<div class="col-xl-4 col-md-4 order-0 order-md-1">
    <div class="sidebar-wrapper">
        <div class="sidebar" id="stickySidebar">
            <div class="card ts-rounded-12 overflow-hidden ">
                <div class="card-body " style="padding-block:9px">
                    <div class="d-flex gap-3">
                        <div class="position-relative w-100">
                            <button
                                class="btn p-0 ps-2 position-absolute-vertical-50 d-flex align-items-center justify-content-center">
                                <img width="24" src="{{ URL::asset('assets/images/search-lines.svg') }}"
                                    alt="...">
                            </button>
                            <input type="text" class="form-control w-100 ps-5 ts-rounded-06" placeholder="Search... "
                                id="quizSearch" value="{{ $query }}">
                        </div>


                        <div
                            class="fs-3 border border-primary text-primary bg-soft-primary rounded-2 d-flex align-items-center gap-2 justify-content-center px-2 fw-medium">
                            {{-- <i class="ri-timer-fill"></i> --}}
                            <i class="mdi mdi-alarm-multiple"></i>

                            <span id="time-spend" style="width:70px">00:00</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card ts-rounded-12 overflow-hidden">
                <div class="card-body" data-simplebar data-simplebar-auto-hide="false" data-simplebar-track="dark"
                    style="max-height: 230px;">
                    <div class="d-flex gap-3 flex-wrap justify-content-around" id="quiz-buttons">
                        @include('user.quizmanagement.partials.quiz-buttons')
                    </div>
                </div>
            </div>
            <div class="card ts-rounded-12 overflow-hidden" >
                <div class="card-header text-center">
                    <h3 class="text-black fw-medium mb-0">Analysis</h3>
                </div>
                <div class="card-body" data-simplebar data-simplebar-auto-hide="false" data-simplebar-track="dark"
                    style="max-height: 200px;">

                    <div class="text-center py-5" id="show-answer-btn">
                        <button class="btn btn-primary" type="button">
                            Show Answer
                        </button>
                    </div>

                    <div id="suggested_answer" style="display: none;">
                        <p class="">{!! $quiz->suggested_answer !!}</p>
                    </div>

                </div>
                <div class="card-footer d-flex justify-content-between">
                    <button class="btn btn-primary" type="button" id="hide-answer-btn" style="display: none;">
                        Hide Answer
                    </button>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#reportErrorModal">Error
                        Report</button>
                </div>
            </div>

            @if ($quiz->promotion_media)
                <div class="card ts-rounded-12 overflow-hidden">
                    <div class="card-header text-center">
                        <h3 class="mb-0">You may be interested</h3>
                    </div>
                    <div class="card-body">

                        @php
                            $path = $quiz->promotion_media;
                            $extension = pathinfo($path, PATHINFO_EXTENSION);
                            $allowedVideoFormats = explode('|', config('fileformats.video'));
                            $isVideo = in_array($extension, $allowedVideoFormats);
                            $src = Helpers::image($path, 'quiz/gallery/');
                        @endphp
                        @if ($isVideo)
                            <video src="{{ $src }}" width="320" height="240" controls></video>
                            @if ($quiz->promotion_link)
                                <div class="mt-3 text-center">
                                    <a href="{{ $quiz->promotion_link }}" target="_blank">Click here to view
                                        more Details </a>
                                </div>
                            @endif
                        @else
                            <a href="{{ $quiz->promotion_link }}" target="_blank"> <img src="{{ $src }}"
                                    alt="promotion media" class="img-thumbnail img-fluid mt-2"> </a>
                        @endif

                    </div>
                </div>
            @endif
        </div>
    </div>


</div>
@pushOnce('partial_script') 
<script src="{{ URL::asset('/assets/libs/swiper/swiper.min.js') }}"></script>   
<script type="text/javascript">

    var gamebasedImgUrl='{{asset('gamebased')}}';
    function swiperInit() {
        var swiper = new Swiper(".navigation-swiper", {
            loop: true,
            autoHeight: true, //enable auto height
            autoplay: false,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev"
            },
            pagination: {
                clickable: true,
                el: ".swiper-pagination"
            }
        }); //Pagination Dynamic Swiper
    }
    swiperInit();

    function toggleAnswerDisplay() {
        const showBtn = document.querySelector('#show-answer-btn');
        const hideBtn = document.querySelector('#hide-answer-btn');
        const suggestedAnswer = document.querySelector('#suggested_answer');
        showBtn.addEventListener('click', () => {
            suggestedAnswer.style.display = 'block';
            showBtn.style.display = 'none';
            hideBtn.style.display = 'block';
        });
        hideBtn.addEventListener('click', () => {
            suggestedAnswer.style.display = 'none';
            showBtn.style.display = 'block';
            hideBtn.style.display = 'none';
        });
    }
    toggleAnswerDisplay();
    
    
</script>

<script type="text/javascript">
    let timerSpentInterval;
    let timeSpentVar = 'timeSpent_{{ auth()->user()->id.$quiz->quiz_group . $quiz->quizbankmanagement_id }}';

    startTimer();

    function startTimer() {
        let timeSpent = 0;
        if (localStorage.getItem(timeSpentVar)) {
            timeSpent = parseInt(localStorage.getItem(timeSpentVar));
        }
        const timerDisplay = document.getElementById('time-spend');
        timerSpentInterval = setInterval(() => {
            timeSpent += 1;
            updateTimerDisplay(timerDisplay, timeSpent);
            localStorage.setItem(timeSpentVar, timeSpent);
        }, 1000);
    }

    function stopTimer() {
        clearInterval(timerSpentInterval);
        localStorage.removeItem(timeSpentVar);
    }

    function updateTimerDisplay(timerDisplay, timeSpent) {
        const minutes = Math.floor(timeSpent / 60);
        const seconds = timeSpent % 60;
        const formattedTime = `${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;
        timerDisplay.textContent = formattedTime;
    }


    const completeQuizButton = document.querySelector('.quiz-comleted-button');
    if (completeQuizButton) {
        completeQuizButton.addEventListener('click', () => {

            let totaltimeSpent = 0;
            if (localStorage.getItem('timeSpent')) {
                totaltimeSpent = parseInt(localStorage.getItem('timeSpent'));
            }
            const url = completeQuizButton.dataset.href + '?time_spent=' + totaltimeSpent;
            stopTimer();
            window.location = url;

        });
    }

    // Handle search input keyup event
    $(document).on('keyup', '#quizSearch', function(event) {
        var query = $(this).val();
        // Send AJAX request to fetch filtered quiz data
        $.ajax({
            url: "{{ route('user.quiz.test.search', ['quiz_management_slug' => $quizbankmanagement->slug, 'quiz_group' => $quiz->quiz_group]) }}",
            method: "GET",
            data: {
                query: query
            },
            success: function(data) {
                // Update quiz buttons with filtered data
                $('#quiz-buttons').html(data);
            }
        });
    });
    
</script>
@endPushOnce
