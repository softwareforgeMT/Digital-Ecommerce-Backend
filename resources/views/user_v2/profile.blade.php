@extends('user.layouts.master')
@section('title')
    @lang('translation.profile')
@endsection
@section('css')
    <link rel="stylesheet" href="{{ URL::asset('assets/libs/swiper/swiper.min.css') }}">

    <style type="text/css">
        .flex-col-row>[class*='col-'] {
            display: flex;
            /*flex-direction: column;*/
        }

        .position-top {
            bottom: 100% !important;
            right: 0%;
            top: unset !important;
            margin-bottom: 3px;
        }

        .tooltip-active .valid-tooltip {
            display: block;
        }

        .social-share-btns {
            display: inline-flex;
        }

        .social-share-btns .avatar-xs {
            width: 3rem !important;
            height: 3rem !important;
        }

        .social-share-btns .avatar-xs .avatar-title {
            font-size: 24px;
        }

        .social-share-btns a {
            margin-left: 5px;
        }

        .bg-linkedin {
            background-color: #0677b5 !important;
        }

        .bg-whatsapp {
            background-color: #0d9f16 !important;
        }

        .bg-copylink {
            background: none !important;
            border: 1px solid grey;
            color: black !important;
            cursor: pointer;
        }

        .activelink .bg-copylink {
            border-color: green;
            color: green !important;
        }
    </style>
@endsection
@section('content')

    <div class="row mt-4">
        <div class="col-lg-12">
         

                <div class="row">
                    <div class="col-xl-4">
                      
                        @if ($gs->is_affilate == 1)
                            <div class="card text-center ts-rounded-12">
                                <div class="card-body ">
                                    <img style="width: 40px;" src=" {{ URL::asset('assets/images/giftbox.png') }}"
                                        alt="">
                                    <div class="mt-4">
                                        <h5>Promote {{ $gs->name }}</h5>
                                        <p class="text-muted lh-base">Click the link below to refer other agency owners</p>
                                        {{-- <button type="button" class="btn btn-primary btn-label rounded-pill" data-bs-toggle="modal" data-bs-target="#socialShare"><i class="ri-share-fill label-icon align-middle rounded-pill fs-16 me-2"></i> Your Link</button> --}}

                                        <div class="col-md-12 position-relative copy-text-in">
                                            <div class="input-group has-validation ">
                                                <input type="text" class="form-control link" id=""
                                                    aria-describedby=""
                                                    value="{{ route('front.index') }}?reff={{ Auth::user()->affiliate_code }}"
                                                    readonly>
                                                <button class="input-group-text copy-text" id=""><i
                                                        class="ri-file-copy-line"></i></button>
                                                <div class="valid-tooltip position-top">
                                                    Copied!
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!--end card-->
                        @endif

                        <div class="card ts-rounded-12">
                            <div class="card-body">
                                <h2 class=" fs-2 flex-grow-1 fw-medium text-black mb-3">Info</h2>
                                <div class="table-responsive">
                                    <table class="table table-borderless mb-0">

                                        <ul class="list-unstyled mb-0 vstack gap-3">
                                            <li>
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-shrink-0">
                                                        <img src="{!! Helpers::image($data->photo, 'user/avatar/', 'user.png') !!}" alt="" class="avatar-sm rounded">
                                                    </div>
                                                    <div class="flex-grow-1 ms-3">
                                                       <h6 class="fs-14 mb-1">{{ucfirst($data->name)}}</h6>
                                                       <p class="text-muted mb-0">Customer</p>
                                                    </div>
                                                </div>
                                            </li>
                                           

                                            <li class="d-flex align-items-center"><i class="ri-mail-line me-2 align-middle text-muted fs-16"></i><strong class="me-1">Email :</strong>{{$data->email}}</li>
                                            <li class="d-flex align-items-center"><i class="ri-phone-line me-2 align-middle text-muted fs-16"></i> <strong class="me-1"> Phone : </strong>{{$data->phone}}</li>

                                            <li class="d-flex align-items-center"><i class="ri-parent-fill me-2 align-middle text-muted fs-16"></i><strong class="me-1">Gender :</strong>{{ucfirst($data->gender)}}</li>
                                            <li class="d-flex align-items-center"><i class="las la-university me-2 align-middle text-muted fs-16"></i><strong class="me-1">University :</strong>{{($data->university)}}</li>
                                            <li class="d-flex align-items-center"><i class="ri-book-open-fill me-2 align-middle text-muted fs-16"></i><strong class="me-1">Major :</strong>{{($data->maj_sub)}}</li>
                                            <li class="d-flex align-items-center"><i class="ri-user-location-fill me-2 align-middle text-muted fs-16"></i><strong class="me-1">Country :</strong>{{$data->country_id ? $data->country->country_name : 'nil'}}</li>
                                            <li class="d-flex align-items-center"><i class="las la-graduation-cap me-2 align-middle text-muted fs-16"></i><strong class="me-1">Education Level :</strong>{{$data->internshipgraduate ? ucfirst($data->internshipgraduate) : 'nil'}}</li>


                                        </ul>
                                    </table>
                                    <a href="{{ route('user.account-settings') }}" class="btn btn-primary w-100 mt-4">Edit Info</a>
                                   
                                </div>
                            </div><!-- end card body -->
                        </div><!-- end card -->
                    </div>
                    <!--end col-->
                    <div class="col-xl-8">
                        <div class="card ts-rounded-12">
                            <div class="card-body">
                                <div class="d-flex  gap-3 align-items-center mb-4">
                                    <h5 class="fs-2 fw-medium text-black mb-0">My Account</h5>
                                    <button
                                        class="ts-btn-gift btn btn-info rounded-circle shadow text-white py-1 px-2 d-flex justify-content-center align-items-center"
                                        type="button" data-bs-toggle="modal" data-bs-target="#congratsMessageModal" data-bs-title="Welcome" data-bs-message="Thanks for joining us, you can always upgrade membership by paying the price difference only"><i
                                            class="ri-gift-fill"></i>
                                    </button>

                                </div>
                                <hr>

                                <div class="row align-items-center">
                                    <div class="col-xl-12 fs-5">
                                        <div class="">
                                            @php
                                            $activeSubscription = auth()->user()->subscriptionsActive();
                                             $planName = $activeSubscription && $activeSubscription->subplan ? $activeSubscription->subplan->name :'Null';
                                            @endphp
                                            <p>You Current Subscription: {{$planName}}</p>

                                            <p>Referral Code(UID): {{ Auth::user()->affiliate_code }}</p>

                                            <div class="d-flex flex-wrap justify-content-between">
                                                {{-- <p>Numbers Of Usages: 2</p> --}}
                                                <p>Money Earned: <span class="text-primary">  {{ Auth::user()->userbalance(1) }}</p>
                                            </div>
                                        </div>
                                        <hr class="mt-1">
                                        {{-- <div class="">
                                            <p>Numbers Of Quiz Activated: 2
                                            </p>
                                            <p>Numbers Of Tutorial Booked: 2
                                            </p>
                                            <p>Numbers Of Events Participated: 2</p>
                                        </div> --}}
                                        <div class="text-end">
                                            <a href="{{route('user.earnings')}}" class="btn btn-warning px-5 text-white">Withdraw</a>
                                        </div>
                                    </div>
                                </div><!-- end card -->
                            </div>
                        </div>

                        <div class="card ts-rounded-12">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between mb-4">

                                    <div class="d-flex  align-items-center gap-3">

                                        <h2 class="fs-2 flex-grow-1 fw-medium text-black mb-0">My Documents</h2>
                                        
                                        <button
                                            class="ts-btn-gift btn btn-info rounded-circle shadow text-white py-1 px-2 d-flex justify-content-center align-items-center"
                                            type="button" data-bs-toggle="modal" data-bs-target="#congratsMessageModal" data-bs-title="Congrats" data-bs-message="Free download the instruction menu for every step you need"><i
                                                class="ri-gift-fill"></i>
                                        </button>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="table-responsive">
                                            <table class="table table-borderless align-middle mb-0">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th scope="col">File Name</th>
                                                        <th scope="col">Type</th>
                                                        <th scope="col">Upload Date</th>
                                                        <th scope="col">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="dynamic_load_more">
                                                    
                                                      @include('user.includes.documents')
                                                    
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="text-center mt-3">
                                           <a href="javascript:void(0);" class="text-success load-more">
                                                {{-- <i class="mdi mdi-loading mdi-spin fs-20 align-middle me-2"></i> --}}
                                                Load more
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

        </div>
        <!--end tab-content-->
    </div>


    <!-- SocialShare Modal -->
    <div class="modal fade" id="socialShare" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center p-5 pt-0">
                    <lord-icon src="https://cdn.lordicon.com/lupuorrc.json" trigger="loop"
                        colors="primary:#121331,secondary:#08a88a" style="width:120px;height:120px">
                    </lord-icon>

                    @if ($gs->is_affilate == 1)
                        <div class="mt-4">
                            <h4 class="mb-3">Share It With Your Friends!</h4>
                            <p class="text-muted mb-4"> Earn More. Refer a new seller to us and earn $100 per refer ...</p>
                            <div>
                                <div class="social-share-btns copy-text-in">
                                    <a target="_blank" href="{{ $socialShare['twitter'] }}"
                                        class="avatar-xs d-block flex-shrink-0 me-3">
                                        <span class="avatar-title rounded-circle  bg-dark text-light">
                                            <i class="ri-twitter-fill"></i>
                                        </span>
                                    </a>
                                    <a target="_blank" href="{{ $socialShare['facebook'] }}"
                                        class="avatar-xs d-block flex-shrink-0 me-3">
                                        <span class="avatar-title rounded-circle  bg-primary">
                                            <i class="ri-facebook-fill"></i>
                                        </span>
                                    </a>
                                    <a target="_blank" href="{{ $socialShare['linkedin'] }}"
                                        class="avatar-xs d-block flex-shrink-0 me-3">
                                        <span class="avatar-title rounded-circle  bg-linkedin">
                                            <i class="ri-linkedin-fill"></i>
                                        </span>
                                    </a>
                                    <a target="_blank" href="{{ $socialShare['whatsapp'] }}"
                                        class="avatar-xs d-block flex-shrink-0 me-3">
                                        <span class="avatar-title rounded-circle  bg-whatsapp">
                                            <i class="ri-whatsapp-fill"></i>
                                        </span>
                                    </a>
                                    {{-- <a class="avatar-xs d-block flex-shrink-0 me-3 copy-text">
                                <span class="avatar-title rounded-circle  bg-copylink">
                                    <i class="ri-file-copy-line"></i>
                                </span>
                                <input style="display: block;opacity: 0" class="link" id="sharestorelink" value=" {{ route('front.index') }}?reff={{Auth::user()->affiliate_code}}">
                            </a>  --}}
                                </div>
                            </div>
                            {{-- <p> {!! $socialShare !!}
                      <a href="javascript:;" class="copy-link" data-clipboard-target="#sharestorelink"><i class="fa fa-link"></i></a>
                      <input style="display: block;opacity: 0" id="sharestorelink" value=" {{ route('front.index') }}?reff={{Auth::user()->affilate_code}}">
                    </p>  --}}

                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

     <!-- CongratsMessageModal Modal -->
    <div class="modal fade" id="congratsMessageModal" data-bs-backdrop="static"
        data-bs-keyboard="false" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body text-center p-5">
                    <lord-icon src="https://cdn.lordicon.com/lupuorrc.json" trigger="loop"
                        colors="primary:#121331,secondary:#08a88a"
                        style="width:120px;height:120px">
                    </lord-icon>

                    <div class="mt-4">
                        {{-- <h4 class="mb-3">You've made it!</h4>
                        <p class="text-muted mb-4"> The transfer was not
                            successfully received by us. the email of the recipient
                            wasn't correct.</p> --}}

                        <h4 class="mb-3" id="dynamicModalTitle">Loading ...</h4>
                        <p class="text-muted mb-4" id="dynamicModalMessage"></p>

                        <div class="hstack gap-2 justify-content-center">
                            <a href="javascript:void(0);"
                                class="btn btn-light fw-medium"
                                data-bs-dismiss="modal">
                                Close</a>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('script')
    <script src="{{ URL::asset('assets/libs/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/pages/apexcharts-radialbar.init.js') }}"></script>
    <script type="text/javascript">
        let copyText = document.querySelector(".copy-text-in");
        copyText.querySelector(".copy-text").addEventListener("click", function() {
            let input = copyText.querySelector("input.link");
            input.select();
            document.execCommand("copy");
            copyText.classList.add("tooltip-active");
            window.getSelection().removeAllRanges();
            setTimeout(function() {
                copyText.classList.remove("tooltip-active");
            }, 1500);
        });
    </script>

<script>
    var offset = 10;
    var limit = 10;
    var totalRecords = {{ $alldocuments }};
    var loadedRecords = 10;

    // Hide the load more button initially if all records are already loaded
    if (totalRecords <= loadedRecords) {
        $('.load-more').hide();
    }

    $('.load-more').on('click', function() {
        var loadMoreButton = $(this);

        // Disable the load more button temporarily
        loadMoreButton.addClass('disabled');

        $.ajax({
            url: '{{ route("user.load-more-documents") }}',
            type: 'GET',
            data: {
                offset: offset,
                limit: limit
            },
            success: function(response) {
                // Append the loaded documents to the table
                $('.table .dynamic_load_more').append(response);

                // Update the offset and loaded records count for the next request
                offset += limit;
                loadedRecords += limit;

                // Enable the load more button
                loadMoreButton.removeClass('disabled');

                // Hide the load more button if all records are loaded
                if (loadedRecords >= totalRecords) {
                    loadMoreButton.hide();
                }
            },
            error: function() {
                // Handle error if needed
                alert('An error occurred while loading more documents.');
            }
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {

        $('#congratsMessageModal').on('show.bs.modal', function(event) {
            // Get the button that triggered the modal
            var button = $(event.relatedTarget);

            // Extract the data attributes from the button
            var modalTitle = button.data('bs-title');
            var modalMessage = button.data('bs-message');

            // Update the modal's content
            $('#dynamicModalTitle').text(modalTitle);
            $('#dynamicModalMessage').text(modalMessage);
        });
    });

</script>
@endsection
